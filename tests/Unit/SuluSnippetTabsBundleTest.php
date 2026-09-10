<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Unit;

use PERSPEQTIVE\SuluSnippetTabsBundle\Admin\ConfiguredSnippetTabAdmin;
use PERSPEQTIVE\SuluSnippetTabsBundle\Admin\ToolbarActionsBuilder;
use PERSPEQTIVE\SuluSnippetTabsBundle\Content\DataMapper;
use PERSPEQTIVE\SuluSnippetTabsBundle\Content\Resolver;
use PERSPEQTIVE\SuluSnippetTabsBundle\Content\TabFormFieldProvider;
use PERSPEQTIVE\SuluSnippetTabsBundle\SuluSnippetTabsBundle;
use PERSPEQTIVE\SuluSnippetTabsBundle\Tabs\TabConfigCollectionProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

use function sys_get_temp_dir;

class SuluSnippetTabsBundleTest extends TestCase
{
    public function testExtensionAlias(): void
    {
        self::assertSame('sulu_snippet_tabs', $this->createExtension()->getAlias());
    }

    public function testLoadWithoutConfigurationSetsEmptyParameter(): void
    {
        $container = $this->load([]);

        self::assertSame([], $container->getParameter('sulu_snippet_tabs.configuration'));
    }

    public function testLoadSetsConfigurationParameter(): void
    {
        $container = $this->load([
            'configuration' => [
                'shop' => [
                    'snippet_type' => 'shop',
                    'tabs' => [
                        'config' => ['title' => 'Config', 'form_key' => 'shop_config', 'order' => 20],
                        'hours' => ['title' => 'Hours', 'form_key' => 'shop_hours'],
                    ],
                ],
            ],
        ]);

        self::assertSame([
            'shop' => [
                'snippet_type' => 'shop',
                'tabs' => [
                    'config' => ['title' => 'Config', 'form_key' => 'shop_config', 'order' => 20],
                    'hours' => ['title' => 'Hours', 'form_key' => 'shop_hours', 'order' => 0],
                ],
            ],
        ], $container->getParameter('sulu_snippet_tabs.configuration'));
    }

    public function testLoadRegistersServices(): void
    {
        $container = $this->load([]);

        self::assertSame(
            TabConfigCollectionProvider::class,
            $container->getDefinition('perspeqtive_sulu_snippet_tabs.tabs.tab_config_collection_provider')->getClass(),
        );
        self::assertSame(
            ConfiguredSnippetTabAdmin::class,
            $container->getDefinition('perspeqtive_sulu_snippet_tabs.admin.configured_snippet_tab_admin')->getClass(),
        );

        foreach ([ToolbarActionsBuilder::class, TabFormFieldProvider::class, DataMapper::class, Resolver::class] as $id) {
            self::assertTrue($container->hasDefinition($id), $id . ' is not registered');
        }
    }

    public function testLoadTagsAdminService(): void
    {
        $container = $this->load([]);

        $definition = $container->getDefinition('perspeqtive_sulu_snippet_tabs.admin.configured_snippet_tab_admin');

        self::assertArrayHasKey('sulu.admin', $definition->getTags());
        self::assertSame([['context' => 'admin']], $definition->getTag('sulu.context'));
    }

    public function testLoadTagsContentServices(): void
    {
        $container = $this->load([]);

        self::assertSame(
            [['priority' => 64]],
            $container->getDefinition(DataMapper::class)->getTag('sulu_content.data_mapper'),
        );
        self::assertSame(
            [['type' => 'snippetTabs']],
            $container->getDefinition(Resolver::class)->getTag('sulu_content.content_resolver'),
        );
    }

    public function testLoadPassesConfigurationParameterToProvider(): void
    {
        $container = $this->load([]);

        $definition = $container->getDefinition('perspeqtive_sulu_snippet_tabs.tabs.tab_config_collection_provider');

        self::assertSame('%sulu_snippet_tabs.configuration%', $definition->getArgument('$tabConfigs'));
    }

    public function testLoadFailsWithoutSnippetType(): void
    {
        $this->expectException(InvalidConfigurationException::class);

        $this->load([
            'configuration' => [
                'shop' => [
                    'tabs' => [
                        'config' => ['title' => 'Config', 'form_key' => 'shop_config'],
                    ],
                ],
            ],
        ]);
    }

    public function testLoadFailsWithoutTitle(): void
    {
        $this->expectException(InvalidConfigurationException::class);

        $this->load([
            'configuration' => [
                'shop' => [
                    'snippet_type' => 'shop',
                    'tabs' => [
                        'config' => ['form_key' => 'shop_config'],
                    ],
                ],
            ],
        ]);
    }

    public function testLoadFailsWithoutFormKey(): void
    {
        $this->expectException(InvalidConfigurationException::class);

        $this->load([
            'configuration' => [
                'shop' => [
                    'snippet_type' => 'shop',
                    'tabs' => [
                        'config' => ['title' => 'Config'],
                    ],
                ],
            ],
        ]);
    }

    public function testLoadFailsWithUnknownOption(): void
    {
        $this->expectException(InvalidConfigurationException::class);

        $this->load([
            'configuration' => [
                'shop' => [
                    'snippet_type' => 'shop',
                    'unknown' => 'value',
                    'tabs' => [],
                ],
            ],
        ]);
    }

    /**
     * @param array<string, mixed> $config
     */
    private function load(array $config): ContainerBuilder
    {
        $container = new ContainerBuilder();
        $container->setParameter('kernel.environment', 'test');
        $container->setParameter('kernel.build_dir', sys_get_temp_dir());
        $container->setParameter('kernel.debug', false);

        $this->createExtension()->load([$config], $container);

        return $container;
    }

    private function createExtension(): ExtensionInterface
    {
        $extension = (new SuluSnippetTabsBundle())->getContainerExtension();
        self::assertInstanceOf(ExtensionInterface::class, $extension);

        return $extension;
    }
}
