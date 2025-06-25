<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Unit\Tabs;

use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfig;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfigCollectionProvider;
use PHPUnit\Framework\TestCase;

class TabConfigCollectionProviderTest extends TestCase
{
    public function testGetTabConfigCollection(): void
    {
        $tabConfigCollectionProvider = new TabConfigCollectionProvider([]);
        $tabConfigCollection = $tabConfigCollectionProvider->getTabConfigCollection();

        $this->assertCount(0, $tabConfigCollection);
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
            [
                'snippet_type' => 'shop',
                'tabs' => [
                    ['title' => 'config', 'form_key' => 'config', 'order' => 10],
                    ['title' => 'business_hours', 'form_key' => 'business_hours', 'order' => 20],
                ],
            ],
            [
                'snippet_type' => 'other',
                'tabs' => [
                    ['title' => 'config', 'form_key' => 'config', 'order' => 10],
                    ['title' => 'business_hours', 'form_key' => 'business_hours', 'order' => 10],
                ],
            ],
        ];

        $tabConfigCollectionProvider = new TabConfigCollectionProvider($config);
        $tabConfigCollection = $tabConfigCollectionProvider->getTabConfigCollection();

        self::assertCount(4, $tabConfigCollection);
        self::assertEquals($expected, (array) $tabConfigCollection->getIterator());
    }
}
