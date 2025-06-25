<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Assert;

use PHPUnit\Framework\Assert;
use Sulu\Bundle\AdminBundle\Admin\View\View;

class AssertView extends Assert
{
    public static function assertResourceView(array $expected, View $view): void
    {
        self::assertSame($expected['name'], $view->getName(), 'name does not match');
        self::assertSame($expected['path'], $view->getPath(), 'path does not match');
        self::assertSame($expected['locales'] ?? null, $view->getOption('locales'), 'locales do not match');
        self::assertSame($expected['backView'] ?? null, $view->getOption('backView'), 'backView does not match');
        self::assertSame($expected['routerAttributesToBackView'] ?? null, $view->getOption('routerAttributesToBackView'), 'routerAttributesToBackView does not match');
        self::assertSame($expected['parent'] ?? null, $view->getOption('parent'), 'parent does not match');
    }

    public static function assertFormView(array $expected, View $view): void
    {
        self::assertSame($expected['name'] ?? null, $view->getName(), 'name does not match');
        self::assertSame($expected['path'] ?? null, $view->getPath(), 'path does not match');
        self::assertSame($expected['backView'] ?? null, $view->getOption('backView'), 'backView does not match');
        self::assertSame($expected['parent'] ?? null, $view->getParent(), 'parent does not match');
        self::assertSame($expected['resourceKey'] ?? null, $view->getOption('resourceKey'), 'resourceKey does not match');
        self::assertSame($expected['formKey'] ?? null, $view->getOption('formKey'), 'formKey does not match');
        self::assertSame($expected['tabTitle'] ?? null, $view->getOption('tabTitle'), 'tabTitle does not match');
        self::assertSame($expected['tabOrder'] ?? null, $view->getOption('tabOrder'), 'tabOrder does not match');
        self::assertSame($expected['template == "shop"'] ?? null, $view->getOption('template == "shop"'), 'template == "shop" does not match');
        self::assertSame($expected['editView'] ?? null, $view->getOption('editView'), 'editView does not match');
    }
}
