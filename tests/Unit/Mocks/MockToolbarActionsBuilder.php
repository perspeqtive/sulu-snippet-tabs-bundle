<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Unit\Mocks;

use PERSPEQTIVE\SuluSnippetTabsBundle\Admin\ToolbarActionsBuilderInterface;
use Sulu\Bundle\AdminBundle\Admin\View\ViewCollection;

class MockToolbarActionsBuilder implements ToolbarActionsBuilderInterface
{
    public function __construct(public array $result = [])
    {
    }

    public function getToolbarActions(ViewCollection $viewCollection, string $resourceViewBuilderName): array
    {
        return $this->result;
    }
}
