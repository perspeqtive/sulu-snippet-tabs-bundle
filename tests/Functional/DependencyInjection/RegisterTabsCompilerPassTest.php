<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Functional\DependencyInjection;

use Exception;
use Sulu\Bundle\AdminBundle\Admin\View\View;
use Sulu\Bundle\AdminBundle\Admin\View\ViewRegistry;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use function restore_exception_handler;
use function sprintf;

class RegisterTabsCompilerPassTest extends KernelTestCase
{
    public function testViewsAreCreated(): void
    {
        /** @var ViewRegistry $viewRegistry */
        $viewRegistry = static::getContainer()->get('sulu_admin.view_registry');

        self::assertHasView('sulu_snippet.edit_form.services_tools', $viewRegistry);
        self::assertHasView('sulu_snippet.edit_form.services_regions', $viewRegistry);
        self::assertHasView('sulu_snippet.edit_form.events_locations', $viewRegistry);
        self::assertHasView('sulu_snippet.edit_form.events_catering', $viewRegistry);
    }

    public function testExtensionsAreCreated(): void
    {
        $container = static::getContainer();

        self::assertTrue($container->has('perspeqtive_sulu_snippet_tabs.extension.services'));
        self::assertTrue($container->has('perspeqtive_sulu_snippet_tabs.extension.events'));
    }

    private static function assertHasView(string $name, ViewRegistry $viewRegistry): void
    {
        try {
            $view = $viewRegistry->findViewByName($name);
            self::assertInstanceOf(View::class, $view);
        } catch (Exception) {
            self::fail(sprintf('View "%s" does not exist.', $name));
        }
    }

    protected function tearDown(): void
    {
        restore_exception_handler();
        parent::tearDown();
    }
}
