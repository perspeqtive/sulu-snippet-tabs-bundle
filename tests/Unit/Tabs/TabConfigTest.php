<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Unit\Tabs;

use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfig;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class TabConfigTest extends TestCase
{
    public function testProperties(): void
    {
        $tabConfig = new TabConfig('Business Hours', 'shop', 10, 'business_hours');

        self::assertSame('Business Hours', $tabConfig->title);
        self::assertSame('shop', $tabConfig->snippetType);
        self::assertSame(10, $tabConfig->order);
        self::assertSame('business_hours', $tabConfig->formKey);
    }

    #[DataProvider('provideFormKeys')]
    public function testGetUrl(string $formKey, string $expectedUrl): void
    {
        $tabConfig = new TabConfig('Title', 'shop', 0, $formKey);

        self::assertSame($expectedUrl, $tabConfig->getUrl());
    }

    /**
     * @return iterable<string, array{string, string}>
     */
    public static function provideFormKeys(): iterable
    {
        yield 'simple' => ['config', '/config'];
        yield 'underscores are replaced by dashes' => ['business_hours', '/business-hours'];
        yield 'multiple underscores' => ['a_b_c', '/a-b-c'];
        yield 'upper case is lowered' => ['BusinessHours', '/businesshours'];
        yield 'mixed' => ['Shop_Business_HOURS', '/shop-business-hours'];
        yield 'already dashed' => ['business-hours', '/business-hours'];
    }
}
