<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Admin;

use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfig;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfigCollectionProviderInterface;
use Sulu\Bundle\AdminBundle\Admin\Admin;
use Sulu\Bundle\AdminBundle\Admin\View\FormViewBuilderInterface;
use Sulu\Bundle\AdminBundle\Admin\View\ResourceTabViewBuilder;
use Sulu\Bundle\AdminBundle\Admin\View\ViewBuilderFactoryInterface;
use Sulu\Bundle\AdminBundle\Admin\View\ViewCollection;
use Sulu\Component\Security\Authorization\PermissionTypes;
use Sulu\Component\Security\Authorization\SecurityCheckerInterface;
use Sulu\Snippet\Domain\Model\SnippetInterface;

use function str_ends_with;

class ConfiguredSnippetTabAdmin extends Admin
{
    public function __construct(
        private readonly ViewBuilderFactoryInterface $viewBuilderFactory,
        private readonly TabConfigCollectionProviderInterface $tabConfigCollectionProvider,
        private readonly ToolbarActionsBuilderInterface $toolbarActionsBuilder,
        private readonly SecurityCheckerInterface $securityChecker,
    ) {
    }

    public function configureViews(ViewCollection $viewCollection): void
    {
        $editResourceCollection = $this->findAllEditResourceViews($viewCollection);

        $tabConfigCollection = $this->tabConfigCollectionProvider->getTabConfigCollection();
        /** @var ResourceTabViewBuilder $resourceViewBuilder */
        foreach ($editResourceCollection->all() as $resourceViewBuilder) {
            $toolbarActions = $this->toolbarActionsBuilder->getToolbarActions($viewCollection, $resourceViewBuilder->getName());
            foreach ($tabConfigCollection as $tabConfig) {
                if ($this->securityChecker->hasPermission($this->buildSecurityContext($tabConfig), PermissionTypes::EDIT) === false) {
                    continue;
                }

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

    public function getSecurityContexts(): array
    {
        $securityContext = [];
        foreach ($this->tabConfigCollectionProvider->getTabConfigCollection() as $tabConfig) {
            $securityContext[$this->buildSecurityContext($tabConfig)] = [
                PermissionTypes::EDIT,
            ];
        }

        return ['Sulu' => ['Snippet Tabs' => $securityContext]];
    }

    private function buildSecurityContext(TabConfig $tabConfig): string
    {
        return 'snippet_tabs.' . $tabConfig->snippetType . '_' . $tabConfig->formKey;
    }
}
