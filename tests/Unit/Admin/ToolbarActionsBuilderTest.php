<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Unit\Admin;

use PERSPEQTIVE\SuluSnippetTabsBundle\Admin\ToolbarActionsBuilder;
use PHPUnit\Framework\TestCase;
use Sulu\Bundle\AdminBundle\Admin\View\DropdownToolbarAction;
use Sulu\Bundle\AdminBundle\Admin\View\FormViewBuilderInterface;
use Sulu\Bundle\AdminBundle\Admin\View\ToolbarAction;
use Sulu\Bundle\AdminBundle\Admin\View\ViewBuilderFactory;
use Sulu\Bundle\AdminBundle\Admin\View\ViewCollection;
use Sulu\Snippet\Domain\Model\SnippetInterface;

class ToolbarActionsBuilderTest extends TestCase
{
    private ToolbarActionsBuilder $toolbarActionsBuilder;
    private ViewBuilderFactory $viewBuilderFactory;

    protected function setUp(): void
    {
        $this->toolbarActionsBuilder = new ToolbarActionsBuilder();
        $this->viewBuilderFactory = new ViewBuilderFactory();
    }

    public function testGetToolbarActionsWithoutContentViewFallsBackToSave(): void
    {
        $toolbarActions = $this->toolbarActionsBuilder->getToolbarActions(new ViewCollection(), 'snippet.edit_tabs');

        self::assertEquals([new ToolbarAction('sulu_admin.save')], $toolbarActions);
    }

    public function testGetToolbarActionsWithContentViewWithoutToolbarActionsFallsBackToSave(): void
    {
        $viewCollection = new ViewCollection();
        $viewCollection->add($this->createContentViewBuilder('snippet.edit_tabs.content'));

        $toolbarActions = $this->toolbarActionsBuilder->getToolbarActions($viewCollection, 'snippet.edit_tabs');

        self::assertEquals([new ToolbarAction('sulu_admin.save')], $toolbarActions);
    }

    public function testGetToolbarActionsReturnsActionsOfContentView(): void
    {
        $saveAction = new ToolbarAction('sulu_admin.save');
        $copyLocaleAction = new ToolbarAction('sulu_admin.copy_locale');

        $viewCollection = $this->buildViewCollection([$saveAction, $copyLocaleAction]);

        $toolbarActions = $this->toolbarActionsBuilder->getToolbarActions($viewCollection, 'snippet.edit_tabs');

        self::assertSame([$saveAction, $copyLocaleAction], $toolbarActions);
    }

    public function testGetToolbarActionsSkipsTypeAction(): void
    {
        $saveAction = new ToolbarAction('sulu_admin.save');
        $typeAction = new ToolbarAction('sulu_admin.type');

        $viewCollection = $this->buildViewCollection([$saveAction, $typeAction]);

        $toolbarActions = $this->toolbarActionsBuilder->getToolbarActions($viewCollection, 'snippet.edit_tabs');

        self::assertSame([$saveAction], $toolbarActions);
    }

    public function testGetToolbarActionsSkipsDropdownContainingDeleteAction(): void
    {
        $saveAction = new ToolbarAction('sulu_admin.save');
        $deleteDropdown = new DropdownToolbarAction('sulu_admin.delete', 'su-trash-alt', [
            new ToolbarAction('sulu_admin.delete_draft'),
            new ToolbarAction('sulu_admin.delete'),
        ]);

        $viewCollection = $this->buildViewCollection([$saveAction, $deleteDropdown]);

        $toolbarActions = $this->toolbarActionsBuilder->getToolbarActions($viewCollection, 'snippet.edit_tabs');

        self::assertSame([$saveAction], $toolbarActions);
    }

    public function testGetToolbarActionsKeepsDropdownWithoutDeleteAction(): void
    {
        $saveAction = new ToolbarAction('sulu_admin.save');
        $dropdown = new DropdownToolbarAction('sulu_admin.edit', 'su-pen', [
            new ToolbarAction('sulu_admin.copy_locale'),
        ]);

        $viewCollection = $this->buildViewCollection([$saveAction, $dropdown]);

        $toolbarActions = $this->toolbarActionsBuilder->getToolbarActions($viewCollection, 'snippet.edit_tabs');

        self::assertSame([$saveAction, $dropdown], $toolbarActions);
    }

    public function testGetToolbarActionsKeepsEmptyDropdown(): void
    {
        $dropdown = new DropdownToolbarAction('sulu_admin.edit', 'su-pen', []);

        $viewCollection = $this->buildViewCollection([$dropdown]);

        $toolbarActions = $this->toolbarActionsBuilder->getToolbarActions($viewCollection, 'snippet.edit_tabs');

        self::assertSame([$dropdown], $toolbarActions);
    }

    public function testGetToolbarActionsWithOnlySkippedActionsReturnsEmptyList(): void
    {
        $viewCollection = $this->buildViewCollection([new ToolbarAction('sulu_admin.type')]);

        $toolbarActions = $this->toolbarActionsBuilder->getToolbarActions($viewCollection, 'snippet.edit_tabs');

        self::assertSame([], $toolbarActions);
    }

    public function testGetToolbarActionsUsesContentViewOfGivenResourceViewOnly(): void
    {
        $ownAction = new ToolbarAction('sulu_admin.save');
        $viewCollection = $this->buildViewCollection([$ownAction]);
        $viewCollection->add(
            $this->createContentViewBuilder('other.edit_tabs.content')
                ->addToolbarActions([new ToolbarAction('sulu_admin.copy_locale')]),
        );

        $toolbarActions = $this->toolbarActionsBuilder->getToolbarActions($viewCollection, 'snippet.edit_tabs');

        self::assertSame([$ownAction], $toolbarActions);
    }

    public function testGetActionsFromMainFormContentViewReturnsEmptyArrayForUnknownView(): void
    {
        $actions = $this->toolbarActionsBuilder->getActionsFromMainFormContentView(new ViewCollection(), 'snippet.edit_tabs');

        self::assertSame([], $actions);
    }

    public function testGetActionsFromMainFormContentViewReturnsUnfilteredActions(): void
    {
        $typeAction = new ToolbarAction('sulu_admin.type');
        $viewCollection = $this->buildViewCollection([$typeAction]);

        $actions = $this->toolbarActionsBuilder->getActionsFromMainFormContentView($viewCollection, 'snippet.edit_tabs');

        self::assertSame([$typeAction], $actions);
    }

    /**
     * @param ToolbarAction[] $toolbarActions
     */
    private function buildViewCollection(array $toolbarActions, string $resourceViewName = 'snippet.edit_tabs'): ViewCollection
    {
        $viewCollection = new ViewCollection();
        $viewCollection->add(
            $this->createContentViewBuilder($resourceViewName . '.content')
                ->addToolbarActions($toolbarActions),
        );

        return $viewCollection;
    }

    private function createContentViewBuilder(string $name): FormViewBuilderInterface
    {
        return $this->viewBuilderFactory->createFormViewBuilder($name, '/content')
            ->setResourceKey(SnippetInterface::RESOURCE_KEY)
            ->setFormKey('snippet');
    }
}
