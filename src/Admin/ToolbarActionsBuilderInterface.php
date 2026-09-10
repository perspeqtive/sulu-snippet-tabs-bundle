<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Admin;

use Sulu\Bundle\AdminBundle\Admin\View\ToolbarAction;
use Sulu\Bundle\AdminBundle\Admin\View\ViewCollection;

interface ToolbarActionsBuilderInterface
{
    /**
     * @return ToolbarAction[]
     */
    public function getToolbarActions(ViewCollection $viewCollection, string $resourceViewBuilderName): array;
}
