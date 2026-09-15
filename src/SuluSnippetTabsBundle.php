<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle;

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class SuluSnippetTabsBundle extends AbstractBundle
{
    /**
     * @param array<string, array<string, mixed>> $config
     */
    public function loadExtension(array $config, ContainerConfigurator $configurator, ContainerBuilder $container): void
    {
        $configurator->import(__DIR__ . '/../config/services.yaml');

        $configurator->parameters()->set('sulu_snippet_tabs.configuration', $config['configuration'] ?? []);
    }

    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->rootNode()
            ->children()
                ->arrayNode('configuration')
                    ->useAttributeAsKey('name')
                    ->arrayPrototype()
                        ->children()
                            ->scalarNode('snippet_type')->isRequired()->end()
                            ->arrayNode('tabs')
                                ->arrayPrototype()
                                    ->children()
                                        ->scalarNode('title')->isRequired()->end()
                                        ->scalarNode('form_key')->isRequired()->end()
                                        ->integerNode('order')->defaultValue(0)->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                    ->defaultValue([])
                ->end()
            ->end();
    }
}
