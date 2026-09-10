<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Unit\Admin;

use PERSPEQTIVE\SuluSnippetTabsBundle\Admin\ConfiguredSnippetTabAdmin;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfig;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfigCollection;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Unit\Mocks\MockSecurityChecker;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Unit\Mocks\MockTabConfigCollectionProvider;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Unit\Mocks\MockToolbarActionsBuilder;
use PHPUnit\Framework\TestCase;
use Sulu\Bundle\AdminBundle\Admin\View\ViewBuilderFactory;
use Sulu\Bundle\AdminBundle\Admin\View\ViewBuilderInterface;
use Sulu\Bundle\AdminBundle\Admin\View\ViewCollection;
use Sulu\Component\Security\Authorization\PermissionTypes;
use Sulu\Snippet\Domain\Model\SnippetInterface;

use function array_keys;

class ConfiguredSnippetTabAdminTest extends TestCase
{
    private ViewBuilderFactory $viewBuilderFactory;
    private MockToolbarActionsBuilder $toolbarActionsBuilder;
    private ConfiguredSnippetTabAdmin $admin;
    private MockTabConfigCollectionProvider $tabConfigCollectionProvider;
    private MockSecurityChecker $securityChecker;

    protected function setUp(): void
    {
        $this->viewBuilderFactory = new ViewBuilderFactory();

        $this->tabConfigCollectionProvider = new MockTabConfigCollectionProvider(new TabConfigCollection());

        $this->toolbarActionsBuilder = new MockToolbarActionsBuilder();

        $this->securityChecker = new MockSecurityChecker();

        $this->admin = new ConfiguredSnippetTabAdmin(
            $this->viewBuilderFactory,
            $this->tabConfigCollectionProvider,
            $this->toolbarActionsBuilder,
            $this->securityChecker,
        );
    }

    public function testConfigureViewsWithEmptyViewCollection(): void
    {
        $this->tabConfigCollectionProvider->tabConfigCollection->add(new TabConfig('Title 1', 'shop', 10, 'key_1'));

        $viewCollection = new ViewCollection();
        $this->admin->configureViews($viewCollection);

        self::assertSame([], $viewCollection->all());
    }

    public function testConfigureViewsWithoutTabConfigsAddsNoViews(): void
    {
        $viewCollection = new ViewCollection();
        $viewCollection->add($this->buildResourceTabViewBuilder('snippet.edit_tabs', '/snippets/:id'));

        $this->admin->configureViews($viewCollection);

        self::assertSame(['snippet.edit_tabs'], array_keys($viewCollection->all()));
    }

    public function testConfigureViewsIgnoresNonMatchingViews(): void
    {
        $this->tabConfigCollectionProvider->tabConfigCollection->add(new TabConfig('Title 1', 'shop', 10, 'key_1'));

        $viewCollection = new ViewCollection();
        $viewCollection->add($this->buildResourceTabViewBuilder('page.edit_tabs', '/pages/:id', 'pages'));
        $viewCollection->add($this->buildResourceTabViewBuilder('snippet.edit_form', '/snippets/:id'));
        $viewCollection->add(
            $this->viewBuilderFactory->createListViewBuilder('snippet.list.edit_tabs', '/snippets')
                ->setResourceKey(SnippetInterface::RESOURCE_KEY)
                ->setListKey('snippets')
                ->addListAdapters(['table']),
        );

        $this->admin->configureViews($viewCollection);

        self::assertSame(
            ['page.edit_tabs', 'snippet.edit_form', 'snippet.list.edit_tabs'],
            array_keys($viewCollection->all()),
        );
    }

    public function testConfigureViewsAddsATabViewPerTabConfigAndResourceView(): void
    {
        $this->tabConfigCollectionProvider->tabConfigCollection->add(new TabConfig('Title 1', 'shop', 10, 'key_1'));
        $this->tabConfigCollectionProvider->tabConfigCollection->add(new TabConfig('Title 2', 'services', 20, 'key_2'));

        $viewCollection = new ViewCollection();
        $viewCollection->add($this->buildResourceTabViewBuilder('snippet.edit_tabs', '/snippets/:id'));
        $viewCollection->add($this->buildResourceTabViewBuilder('other_snippet.edit_tabs', '/other-snippets/:id'));

        $this->admin->configureViews($viewCollection);

        self::assertSame([
            'snippet.edit_tabs',
            'other_snippet.edit_tabs',
            'snippet.edit_tabs.key_1',
            'snippet.edit_tabs.key_2',
            'other_snippet.edit_tabs.key_1',
            'other_snippet.edit_tabs.key_2',
        ], array_keys($viewCollection->all()));
    }

    public function testConfigureViewsConfiguresTabView(): void
    {
        $this->tabConfigCollectionProvider->tabConfigCollection->add(new TabConfig('Business Hours', 'shop', 10, 'Business_Hours'));

        $viewCollection = new ViewCollection();
        $viewCollection->add($this->buildResourceTabViewBuilder('snippet.edit_tabs', '/snippets/:id'));

        $this->admin->configureViews($viewCollection);

        $view = $viewCollection->get('snippet.edit_tabs.Business_Hours')->getView();

        self::assertSame('snippet.edit_tabs.Business_Hours', $view->getName());
        self::assertSame('/business-hours', $view->getPath());
        self::assertSame('sulu_admin.form', $view->getType());
        self::assertSame('snippet.edit_tabs', $view->getParent());
        self::assertSame(SnippetInterface::RESOURCE_KEY, $view->getOption('resourceKey'));
        self::assertSame('Business_Hours', $view->getOption('formKey'));
        self::assertSame('Business Hours', $view->getOption('tabTitle'));
        self::assertSame(10, $view->getOption('tabOrder'));
        self::assertSame('template == "shop"', $view->getOption('tabCondition'));
        self::assertTrue($view->getOption('titleVisible'));
    }

    public function testConfigureViewsKeepsResourceViewUntouched(): void
    {
        $this->tabConfigCollectionProvider->tabConfigCollection->add(new TabConfig('Title 1', 'shop', 10, 'key_1'));

        $viewCollection = new ViewCollection();
        $viewCollection->add($this->buildResourceTabViewBuilder('snippet.edit_tabs', '/snippets/:id'));

        $this->admin->configureViews($viewCollection);

        $view = $viewCollection->get('snippet.edit_tabs')->getView();

        self::assertSame('/snippets/:id', $view->getPath());
        self::assertNull($view->getParent());
        self::assertNull($view->getOption('formKey'));
        self::assertNull($view->getOption('toolbarActions'));
    }

    public function testConfigureViewsSkipsTabsWithoutEditPermission(): void
    {
        $this->tabConfigCollectionProvider->tabConfigCollection->add(new TabConfig('Title 1', 'shop', 10, 'key_1'));
        $this->tabConfigCollectionProvider->tabConfigCollection->add(new TabConfig('Title 2', 'services', 20, 'key_2'));
        $this->securityChecker->allowedSubjects = ['snippet_tabs.services_key_2'];

        $viewCollection = new ViewCollection();
        $viewCollection->add($this->buildResourceTabViewBuilder('snippet.edit_tabs', '/snippets/:id'));

        $this->admin->configureViews($viewCollection);

        self::assertSame(
            ['snippet.edit_tabs', 'snippet.edit_tabs.key_2'],
            array_keys($viewCollection->all()),
        );
    }

    public function testConfigureViewsAddsNoTabViewWhenEveryPermissionIsDenied(): void
    {
        $this->tabConfigCollectionProvider->tabConfigCollection->add(new TabConfig('Title 1', 'shop', 10, 'key_1'));
        $this->tabConfigCollectionProvider->tabConfigCollection->add(new TabConfig('Title 2', 'services', 20, 'key_2'));
        $this->securityChecker->allowedSubjects = [];

        $viewCollection = new ViewCollection();
        $viewCollection->add($this->buildResourceTabViewBuilder('snippet.edit_tabs', '/snippets/:id'));

        $this->admin->configureViews($viewCollection);

        self::assertSame(['snippet.edit_tabs'], array_keys($viewCollection->all()));
    }

    public function testConfigureViewsChecksEditPermissionForEveryTabConfigAndResourceView(): void
    {
        $this->tabConfigCollectionProvider->tabConfigCollection->add(new TabConfig('Title 1', 'shop', 10, 'key_1'));
        $this->tabConfigCollectionProvider->tabConfigCollection->add(new TabConfig('Title 2', 'services', 20, 'key_2'));

        $viewCollection = new ViewCollection();
        $viewCollection->add($this->buildResourceTabViewBuilder('snippet.edit_tabs', '/snippets/:id'));
        $viewCollection->add($this->buildResourceTabViewBuilder('other_snippet.edit_tabs', '/other-snippets/:id'));

        $this->admin->configureViews($viewCollection);

        self::assertSame([
            ['subject' => 'snippet_tabs.shop_key_1', 'permission' => PermissionTypes::EDIT],
            ['subject' => 'snippet_tabs.services_key_2', 'permission' => PermissionTypes::EDIT],
            ['subject' => 'snippet_tabs.shop_key_1', 'permission' => PermissionTypes::EDIT],
            ['subject' => 'snippet_tabs.services_key_2', 'permission' => PermissionTypes::EDIT],
        ], $this->securityChecker->calls);
    }

    public function testConfigureViewsChecksNoPermissionWithoutMatchingResourceView(): void
    {
        $this->tabConfigCollectionProvider->tabConfigCollection->add(new TabConfig('Title 1', 'shop', 10, 'key_1'));

        $this->admin->configureViews(new ViewCollection());

        self::assertSame([], $this->securityChecker->calls);
    }

    public function testGetSecurityContextsReturnsAnEditContextPerTabConfig(): void
    {
        $this->tabConfigCollectionProvider->tabConfigCollection->add(new TabConfig('Title 1', 'shop', 10, 'key_1'));
        $this->tabConfigCollectionProvider->tabConfigCollection->add(new TabConfig('Title 2', 'services', 20, 'key_2'));

        self::assertSame([
            'Sulu' => [
                'Snippet Tabs' => [
                    'snippet_tabs.shop_key_1' => [PermissionTypes::EDIT],
                    'snippet_tabs.services_key_2' => [PermissionTypes::EDIT],
                ],
            ],
        ], $this->admin->getSecurityContexts());
    }

    public function testGetSecurityContextsWithoutTabConfigs(): void
    {
        self::assertSame(['Sulu' => ['Snippet Tabs' => []]], $this->admin->getSecurityContexts());
    }

    public function testGetSecurityContextsDeduplicatesEqualContexts(): void
    {
        $this->tabConfigCollectionProvider->tabConfigCollection->add(new TabConfig('Title 1', 'shop', 10, 'key_1'));
        $this->tabConfigCollectionProvider->tabConfigCollection->add(new TabConfig('Other title', 'shop', 20, 'key_1'));

        self::assertSame([
            'Sulu' => [
                'Snippet Tabs' => [
                    'snippet_tabs.shop_key_1' => [PermissionTypes::EDIT],
                ],
            ],
        ], $this->admin->getSecurityContexts());
    }

    private function buildResourceTabViewBuilder(
        string $name,
        string $path,
        string $resourceKey = SnippetInterface::RESOURCE_KEY,
    ): ViewBuilderInterface {
        return $this->viewBuilderFactory->createResourceTabViewBuilder($name, $path)
            ->setResourceKey($resourceKey);
    }
}
