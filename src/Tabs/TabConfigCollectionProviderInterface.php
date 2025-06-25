<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tabs;

interface TabConfigCollectionProviderInterface
{
    public function getTabConfigCollection(): TabConfigCollection;
}
