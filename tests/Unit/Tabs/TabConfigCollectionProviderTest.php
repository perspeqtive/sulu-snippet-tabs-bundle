<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Unit\Tabs;

use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfig;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfigCollectionProvider;
use PHPUnit\Framework\TestCase;

use function iterator_to_array;

class TabConfigCollectionProviderTest extends TestCase
{
    public function testGetTabConfigCollectionWithoutConfig(): void
    {
        $tabConfigCollectionProvider = new TabConfigCollectionProvider([]);
        $tabConfigCollection = $tabConfigCollectionProvider->getTabConfigCollection();

        self::assertCount(0, $tabConfigCollection);
    }

    public function testGetTabConfigCollectionWithSnippetTypeWithoutTabs(): void
    {
        $tabConfigCollectionProvider = new TabConfigCollectionProvider([
            'shop' => ['snippet_type' => 'shop', 'tabs' => []],
        ]);

        self::assertCount(0, $tabConfigCollectionProvider->getTabConfigCollection());
    }

    public function testGetTabConfigCollectionWithMultipleConfigs(): void
    {
        $expected = [
            new TabConfig('config', 'shop', 10, 'config'),
            new TabConfig('business_hours', 'shop', 20, 'business_hours'),
            new TabConfig('config', 'other', 10, 'config'),
            new TabConfig('business_hours', 'other', 10, 'business_hours'),
        ];

        $config = [
            'shop' => [
                'snippet_type' => 'shop',
                'tabs' => [
                    'config' => ['title' => 'config', 'form_key' => 'config', 'order' => 10],
                    'business_hours' => ['title' => 'business_hours', 'form_key' => 'business_hours', 'order' => 20],
                ],
            ],
            'other' => [
                'snippet_type' => 'other',
                'tabs' => [
                    'config' => ['title' => 'config', 'form_key' => 'config', 'order' => 10],
                    'business_hours' => ['title' => 'business_hours', 'form_key' => 'business_hours', 'order' => 10],
                ],
            ],
        ];

        $tabConfigCollectionProvider = new TabConfigCollectionProvider($config);
        $tabConfigCollection = $tabConfigCollectionProvider->getTabConfigCollection();

        self::assertCount(4, $tabConfigCollection);
        self::assertEquals($expected, iterator_to_array($tabConfigCollection));
    }

    public function testGetTabConfigCollectionReturnsNewCollectionOnEachCall(): void
    {
        $tabConfigCollectionProvider = new TabConfigCollectionProvider([
            'shop' => [
                'snippet_type' => 'shop',
                'tabs' => [
                    'config' => ['title' => 'config', 'form_key' => 'config', 'order' => 10],
                ],
            ],
        ]);

        $first = $tabConfigCollectionProvider->getTabConfigCollection();
        $second = $tabConfigCollectionProvider->getTabConfigCollection();

        self::assertNotSame($first, $second);
        self::assertEquals(iterator_to_array($first), iterator_to_array($second));
    }
}
