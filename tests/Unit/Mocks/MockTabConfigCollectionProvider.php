<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Unit\Mocks;

use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfigCollection;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfigCollectionProviderInterface;

class MockTabConfigCollectionProvider implements TabConfigCollectionProviderInterface
{
    public function __construct(public TabConfigCollection $tabConfigCollection = new TabConfigCollection())
    {
    }

    public function getTabConfigCollection(): TabConfigCollection
    {
        return $this->tabConfigCollection;
    }
}
