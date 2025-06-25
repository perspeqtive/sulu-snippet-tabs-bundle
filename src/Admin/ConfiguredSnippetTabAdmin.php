<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Admin;

use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfig;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfigCollectionProvider;
use Sulu\Bundle\AdminBundle\Admin\Admin;
use Sulu\Bundle\AdminBundle\Admin\View\FormViewBuilderInterface;
use Sulu\Bundle\AdminBundle\Admin\View\ResourceTabViewBuilder;
use Sulu\Bundle\AdminBundle\Admin\View\ToolbarAction;
use Sulu\Bundle\AdminBundle\Admin\View\ViewBuilderFactoryInterface;
use Sulu\Bundle\AdminBundle\Admin\View\ViewCollection;
use Sulu\Bundle\SnippetBundle\Admin\SnippetAdmin;
use Sulu\Bundle\SnippetBundle\Document\SnippetDocument;
use Sulu\Component\Security\Authorization\PermissionTypes;
use Sulu\Component\Security\Authorization\SecurityCheckerInterface;

use function str_ends_with;

class ConfiguredSnippetTabAdmin extends Admin
{
    public function __construct(
        private readonly ViewBuilderFactoryInterface $viewBuilderFactory,
        private readonly SecurityCheckerInterface $securityChecker,
        private readonly TabConfigCollectionProvider $tabConfigCollectionProvider,
    ) {
    }

    public function configureViews(ViewCollection $viewCollection): void
    {
        if ($this->securityChecker->hasPermission(SnippetAdmin::SECURITY_CONTEXT, PermissionTypes::EDIT) === false) {
            return;
        }
        $editResourceCollection = $this->findAllEditResourceViews($viewCollection);

        $tabConfigCollection = $this->tabConfigCollectionProvider->getTabConfigCollection();
        /** @var ResourceTabViewBuilder $resourceViewBuilder */
        foreach ($editResourceCollection->all() as $resourceViewBuilder) {
            foreach ($tabConfigCollection as $tabConfig) {
                $viewCollection->add(
                    $this->addTabView($resourceViewBuilder, $tabConfig),
                );
            }
        }
    }

    private function addTabView(ResourceTabViewBuilder $viewBuilder, TabConfig $tabConfig): FormViewBuilderInterface
    {
        $formView = $this->viewBuilderFactory->createFormViewBuilder($viewBuilder->getName() . '.' . $tabConfig->formKey, '/' . $tabConfig->getUrl());

        $formView->setResourceKey(SnippetDocument::RESOURCE_KEY)
                ->setFormKey($tabConfig->formKey)
                ->setTabTitle($tabConfig->title)
                ->setTabOrder($tabConfig->order)
                ->addToolbarActions([new ToolbarAction('sulu_admin.save')])
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
                || $view->getOption('resourceKey') !== SnippetDocument::RESOURCE_KEY
                || str_ends_with($view->getName(), '.edit') === false
            ) {
                continue;
            }
            $result->add($viewBuilder);
        }

        return $result;
    }
}
