<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Functional\DependencyInjection;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use function restore_exception_handler;

class SuluSnippetTabsExtensionTest extends KernelTestCase
{
    public function testLoad(): void
    {
        $settings = static::getContainer()->getParameter('sulu_snippet_tabs.configuration');
        self::assertSame([
            'services' => [
                'snippet_type' => 'services',
                'tabs' => [
                    'tools' => [
                        'title' => 'tools',
                        'form_key' => 'services_tools',
                        'order' => 20,
                    ],
                    'regions' => [
                        'title' => 'regions',
                        'form_key' => 'services_regions',
                        'order' => 30,
                    ],
                ],
            ],
            'events' => [
                'snippet_type' => 'events',
                'tabs' => [
                    'locations' => [
                        'title' => 'locations',
                        'form_key' => 'events_locations',
                        'order' => 10,
                    ],
                    'catering' => [
                        'title' => 'catering',
                        'form_key' => 'events_catering',
                        'order' => 20,
                    ],
                ],
            ],
        ], $settings);
    }

    protected function tearDown(): void
    {
        restore_exception_handler();
        parent::tearDown();
    }
}
