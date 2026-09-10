<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Unit\Tabs;

use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfig;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfigCollection;
use PHPUnit\Framework\TestCase;

use function iterator_to_array;

class TabConfigCollectionTest extends TestCase
{
    public function testEmptyCollection(): void
    {
        $collection = new TabConfigCollection();

        self::assertCount(0, $collection);
        self::assertSame([], iterator_to_array($collection));
    }

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

    public function testKeepsInsertionOrderAndAllowsDuplicates(): void
    {
        $tabConfig1 = new TabConfig('Business Hours', 'shop', 10, 'business_hours');
        $tabConfig2 = new TabConfig('Visibility Settings', 'shop', 20, 'visibility_settings');

        $collection = new TabConfigCollection();
        $collection->add($tabConfig2);
        $collection->add($tabConfig1);
        $collection->add($tabConfig2);

        self::assertCount(3, $collection);
        self::assertSame([$tabConfig2, $tabConfig1, $tabConfig2], iterator_to_array($collection));
    }
}
