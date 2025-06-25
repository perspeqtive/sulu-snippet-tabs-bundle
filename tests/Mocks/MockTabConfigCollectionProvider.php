<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Mocks;

use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfigCollection;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfigCollectionProviderInterface;

class MockTabConfigCollectionProvider implements TabConfigCollectionProviderInterface
{
    public function __construct(public TabConfigCollection $collection = new TabConfigCollection())
    {
    }

    public function getTabConfigCollection(): TabConfigCollection
    {
        return $this->collection;
    }
}
