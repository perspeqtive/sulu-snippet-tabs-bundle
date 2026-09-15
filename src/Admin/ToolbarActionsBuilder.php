<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Admin;

use Sulu\Bundle\AdminBundle\Admin\View\DropdownToolbarAction;
use Sulu\Bundle\AdminBundle\Admin\View\ToolbarAction;
use Sulu\Bundle\AdminBundle\Admin\View\ViewCollection;
use Sulu\Bundle\AdminBundle\Exception\ViewNotFoundException;

class ToolbarActionsBuilder implements ToolbarActionsBuilderInterface
{
    public function getToolbarActions(ViewCollection $viewCollection, string $resourceViewBuilderName): array
    {
        $toolbarActions = $this->getActionsFromMainFormContentView($viewCollection, $resourceViewBuilderName);

        if (empty($toolbarActions) === true) {
            return [new ToolbarAction('sulu_admin.save')];
        }

        return $this->getAllowedToolbarActions($toolbarActions);
    }

    /**
     * @return array<string, ToolbarAction>
     */
    public function getActionsFromMainFormContentView(ViewCollection $viewCollection, string $resourceViewBuilderName): array
    {
        $toolbarActions = [];
        try {
            /** @var array<string, ToolbarAction> $toolbarActions */
            $toolbarActions = $viewCollection->get($resourceViewBuilderName . '.content')->getView()->getOption('toolbarActions') ?? [];
        } catch (ViewNotFoundException) {
        }

        return $toolbarActions;
    }

    /**
     * @param array<string, ToolbarAction> $toolbarActions
     *
     * @return ToolbarAction[]
     */
    private function getAllowedToolbarActions(array $toolbarActions): array
    {
        $allowedToolbarActions = [];

        foreach ($toolbarActions as $toolbarAction) {
            if ($toolbarAction->getType() === 'sulu_admin.type') {
                continue;
            }
            if ($toolbarAction instanceof DropdownToolbarAction) {
                /** @var array{toolbarActions?: array<string,ToolbarAction>} $subActions */
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
