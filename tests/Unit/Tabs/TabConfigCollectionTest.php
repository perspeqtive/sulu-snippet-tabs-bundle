<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Unit\Tabs;

use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfig;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfigCollection;
use PHPUnit\Framework\TestCase;

class TabConfigCollectionTest extends TestCase
{
    public function testRoundTrip(): void
    {
        $tabConfig1 = new TabConfig('Business Hours', 'shop', 10, 'business_hours');
        $tabConfig2 = new TabConfig('Visibility Settings', 'shop', 10, 'visibility_settings');

        $collection = new TabConfigCollection();
        $collection->add($tabConfig1);
        $collection->add($tabConfig2);

        self::assertContains($tabConfig1, $collection);
        self::assertContains($tabConfig2, $collection);
    }
}
