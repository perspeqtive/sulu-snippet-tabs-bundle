<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Unit\Admin;

use PERSPEQTIVE\SuluSnippetTabsBundle\Admin\ConfiguredSnippetTabAdmin;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfig;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Assert\AssertView;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Mocks\MockTabConfigCollectionProvider;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Mocks\Sulu\MockSecurityChecker;
use PHPUnit\Framework\TestCase;
use Sulu\Bundle\AdminBundle\Admin\View\ResourceTabViewBuilderInterface;
use Sulu\Bundle\AdminBundle\Admin\View\ViewBuilderFactory;
use Sulu\Bundle\AdminBundle\Admin\View\ViewCollection;

class ConfiguredSnippetTabAdminTest extends TestCase
{
    private ConfiguredSnippetTabAdmin $admin;
    private ViewBuilderFactory $viewBuilderFactory;
    private MockSecurityChecker $securityChecker;
    private MockTabConfigCollectionProvider $tabConfigCollectionProvider;

    protected function setUp(): void
    {
        $this->securityChecker = new MockSecurityChecker();
        $this->viewBuilderFactory = new ViewBuilderFactory();
        $this->tabConfigCollectionProvider = new MockTabConfigCollectionProvider();
        $this->admin = new ConfiguredSnippetTabAdmin(
            $this->viewBuilderFactory,
            $this->securityChecker,
            $this->tabConfigCollectionProvider,
        );
    }

    public function testConfigureViewCollectionWithAllEmpty(): void
    {
        $viewCollection = new ViewCollection();
        $this->admin->configureViews($viewCollection);
        self::assertCount(0, $viewCollection->all());
    }

    public function testConfigureViewCollectionWithItemsInCollection(): void
    {
        $this->tabConfigCollectionProvider->collection->add(new TabConfig('Title 1', 'shop', 10, 'key_1'));
        $this->tabConfigCollectionProvider->collection->add(new TabConfig('Title 2', 'shop', 20, 'key_2'));
        $this->tabConfigCollectionProvider->collection->add(new TabConfig('Title 3', 'services', 20, 'key_3'));

        $viewCollection = new ViewCollection();
        $viewCollection->add($this->buildResourceViewBuilder('test.edit_form', '/somewhere'));
        $viewCollection->add($this->buildResourceViewBuilder('other_test.edit_form', '/somewhere-else'));
        $viewCollection->add($this->buildResourceViewBuilder('no_snippet_test.edit_form', '/somewhere-else', 'page'));
        $this->admin->configureViews($viewCollection);

        $views = $viewCollection->all();
        self::assertCount(9, $views);
        self::assertArrayHasKey('test.edit_form', $views);
        self::assertArrayHasKey('test.edit_form.key_1', $views);
        self::assertArrayHasKey('test.edit_form.key_2', $views);
        self::assertArrayHasKey('test.edit_form.key_3', $views);
        self::assertArrayHasKey('other_test.edit_form', $views);
        self::assertArrayHasKey('other_test.edit_form.key_1', $views);
        self::assertArrayHasKey('other_test.edit_form.key_2', $views);
        self::assertArrayHasKey('other_test.edit_form.key_3', $views);
        self::assertArrayHasKey('no_snippet_test.edit_form', $views);

        $editView = $views['test.edit_form'];
        AssertView::assertResourceView([
            'name' => 'test.edit_form',
            'path' => '/somewhere',
            'parent' => null,
        ], $editView->getView());

        $editView = $views['test.edit_form.key_1'];
        AssertView::assertFormView([
            'name' => 'test.edit_form.key_1',
            'path' => '/key-1',
            'formKey' => 'key_1',
            'resourceKey' => 'snippets',
            'tabTitle' => 'Title 1',
            'tabOrder' => 10,
            'tabCondition' => 'template == "shop"',
            'parent' => 'test.edit_form',
        ], $editView->getView());

        $editView = $views['test.edit_form.key_2'];
        AssertView::assertFormView([
            'name' => 'test.edit_form.key_2',
            'path' => '/key-2',
            'formKey' => 'key_2',
            'resourceKey' => 'snippets',
            'tabTitle' => 'Title 2',
            'tabOrder' => 20,
            'tabCondition' => 'template == "shop"',
            'parent' => 'test.edit_form',
        ], $editView->getView());

        $editView = $views['test.edit_form.key_3'];
        AssertView::assertFormView([
            'name' => 'test.edit_form.key_3',
            'path' => '/key-3',
            'formKey' => 'key_3',
            'resourceKey' => 'snippets',
            'tabTitle' => 'Title 3',
            'tabOrder' => 20,
            'tabCondition' => 'template == "shop"',
            'parent' => 'test.edit_form',
        ], $editView->getView());

        $editView = $views['other_test.edit_form'];
        AssertView::assertResourceView([
            'name' => 'other_test.edit_form',
            'path' => '/somewhere-else',
            'parent' => null,
        ], $editView->getView());

        $editView = $views['other_test.edit_form.key_1'];
        AssertView::assertFormView([
            'name' => 'other_test.edit_form.key_1',
            'path' => '/key-1',
            'formKey' => 'key_1',
            'resourceKey' => 'snippets',
            'tabTitle' => 'Title 1',
            'tabOrder' => 10,
            'tabCondition' => 'template == "shop"',
            'parent' => 'other_test.edit_form',
        ], $editView->getView());

        $editView = $views['other_test.edit_form.key_2'];
        AssertView::assertFormView([
            'name' => 'other_test.edit_form.key_2',
            'path' => '/key-2',
            'formKey' => 'key_2',
            'resourceKey' => 'snippets',
            'tabTitle' => 'Title 2',
            'tabOrder' => 20,
            'tabCondition' => 'template == "shop"',
            'parent' => 'other_test.edit_form',
        ], $editView->getView());

        $editView = $views['other_test.edit_form.key_3'];
        AssertView::assertFormView([
            'name' => 'other_test.edit_form.key_3',
            'path' => '/key-3',
            'formKey' => 'key_3',
            'resourceKey' => 'snippets',
            'tabTitle' => 'Title 3',
            'tabOrder' => 20,
            'tabCondition' => 'template == "shop"',
            'parent' => 'other_test.edit_form',
        ], $editView->getView());
    }

    private function buildResourceViewBuilder(string $name, string $path, string $resourceKey = 'snippets'): ResourceTabViewBuilderInterface
    {
        return $this->viewBuilderFactory->createResourceTabViewBuilder($name, $path)
            ->setResourceKey($resourceKey);
    }
}
