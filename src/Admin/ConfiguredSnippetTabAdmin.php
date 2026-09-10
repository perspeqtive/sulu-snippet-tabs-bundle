<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Admin;

use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfig;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfigCollectionProviderInterface;
use Sulu\Bundle\AdminBundle\Admin\Admin;
use Sulu\Bundle\AdminBundle\Admin\View\DropdownToolbarAction;
use Sulu\Bundle\AdminBundle\Admin\View\FormViewBuilderInterface;
use Sulu\Bundle\AdminBundle\Admin\View\ResourceTabViewBuilder;
use Sulu\Bundle\AdminBundle\Admin\View\ToolbarAction;
use Sulu\Bundle\AdminBundle\Admin\View\ViewBuilderFactoryInterface;
use Sulu\Bundle\AdminBundle\Admin\View\ViewCollection;
use Sulu\Bundle\AdminBundle\Exception\ViewNotFoundException;
use Sulu\Snippet\Domain\Model\SnippetInterface;

use function str_ends_with;

class ConfiguredSnippetTabAdmin extends Admin
{
    public function __construct(
        private readonly ViewBuilderFactoryInterface $viewBuilderFactory,
        private readonly TabConfigCollectionProviderInterface $tabConfigCollectionProvider,
    ) {
    }

    public function configureViews(ViewCollection $viewCollection): void
    {
        $editResourceCollection = $this->findAllEditResourceViews($viewCollection);

        $tabConfigCollection = $this->tabConfigCollectionProvider->getTabConfigCollection();
        /** @var ResourceTabViewBuilder $resourceViewBuilder */
        foreach ($editResourceCollection->all() as $resourceViewBuilder) {
            $toolbarActions = $this->getToolbarActions($viewCollection, $resourceViewBuilder->getName());
            foreach ($tabConfigCollection as $tabConfig) {
                $viewCollection->add(
                    $this->addTabView($resourceViewBuilder, $tabConfig, $toolbarActions),
                );
            }
        }
    }

    private function addTabView(ResourceTabViewBuilder $viewBuilder, TabConfig $tabConfig, array $toolbarActions): FormViewBuilderInterface
    {
        $formView = $this->viewBuilderFactory->createFormViewBuilder($viewBuilder->getName() . '.' . $tabConfig->formKey, $tabConfig->getUrl());

        $formView->setResourceKey(SnippetInterface::RESOURCE_KEY)
            ->setFormKey($tabConfig->formKey)
            ->setTabTitle($tabConfig->title)
            ->setTabOrder($tabConfig->order)
            ->addToolbarActions($toolbarActions)
            ->setTitleVisible(true)
            ->setTabCondition('template == "' . $tabConfig->snippetType . '"')
            ->setParent($viewBuilder->getName());

        return $formView;
    }

    private function findAllEditResourceViews(ViewCollection $viewCollection): ViewCollection
    {
        $result = new ViewCollection();
        foreach ($viewCollection->all() as $viewBuilder) {
            $view = $viewBuilder->getView();
            if (
                $view->getType() !== ResourceTabViewBuilder::TYPE
                || $view->getOption('resourceKey') !== SnippetInterface::RESOURCE_KEY
                || str_ends_with($view->getName(), '.edit_tabs') === false
            ) {
                continue;
            }
            $result->add($viewBuilder);
        }

        return $result;
    }

    /**
     * @return ToolbarAction[]
     */
    private function getToolbarActions(ViewCollection $viewCollection, string $resourceViewBuilderName): mixed
    {
        try {
            $toolbarActions = $viewCollection->get($resourceViewBuilderName . '.content')->getView()->getOption('toolbarActions');
        } catch (ViewNotFoundException) {
            $toolbarActions = [];
        }

        if (empty($toolbarActions) === true) {
            return [new ToolbarAction('sulu_admin.save')];
        }

        $allowedToolbarActions = [];

        /** @var ToolbarAction $toolbarAction */
        foreach ($toolbarActions as $toolbarAction) {
            if ($toolbarAction->getType() === 'sulu_admin.type') {
                continue;
            }
            if ($toolbarAction instanceof DropdownToolbarAction) {
                $subActions = $toolbarAction->getOptions();
                foreach ($subActions['toolbarActions'] ?? [] as $subAction) {
                    if ($subAction->getType() === 'sulu_admin.delete') {
                        continue 2;
                    }
                }
            }
            $allowedToolbarActions[] = $toolbarAction;
        }

        return $allowedToolbarActions;
    }
}
