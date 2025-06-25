<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\DependencyInjection;

use PERSPEQTIVE\SuluSnippetTabsBundle\DefinitionBuilder\ConfiguredSnippetTabExtensionDefinitionBuilder;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class RegisterTabsCompilerPass implements CompilerPassInterface
{

    private ConfiguredSnippetTabExtensionDefinitionBuilder $configuredSnippetTabExtensionDefinitionBuilder;

    public function __construct()
    {
        $this->configuredSnippetTabExtensionDefinitionBuilder = new ConfiguredSnippetTabExtensionDefinitionBuilder();
    }

    public function process(ContainerBuilder $container): void
    {
        if ($this->shouldBeExecuted($container) === false) {
            return;
        }
        $snippetsTabsConfiguration = $this->fetchConfiguredTree($container);

        foreach ($snippetsTabsConfiguration as $typeConfiguration) {
            $this->addConfigToContainer($typeConfiguration, $container);
        }
    }

    private function shouldBeExecuted(ContainerBuilder $container): bool
    {
        return $container->hasDefinition('sulu_admin.view_builder_factory') === true
            && $container->hasDefinition('sulu_security.security_checker') === true;
    }

    /**
     * @return array<string, array{
     *     snippet_type: string,
     *     tabs: array<string, array{
     *         title: string,
     *         form_key: string,
     *         order: int
     *     }>
     * }>
     */
    private function fetchConfiguredTree(ContainerBuilder $container): array
    {
        // @phpstan-ignore-next-line
        return $container->getParameter('sulu_snippet_tabs.configuration');
    }

    private function addConfigToContainer(array $typeConfiguration, ContainerBuilder $container): void
    {
        $formKeys = [];
        foreach ($typeConfiguration['tabs'] as $tabConfig) {
            $formKeys[] = $tabConfig['formKey'];
        }
        $this->addDefinitionForExtension($container, $typeConfiguration['snippet_type'], $formKeys);
    }

    private function addDefinitionForExtension(ContainerBuilder $container, string $snippetType, array $formKeys): void
    {
        $container->setDefinition(
            'perspeqtive_sulu_snippet_tabs.extension.' . $snippetType,
            $this->configuredSnippetTabExtensionDefinitionBuilder->build($container, $snippetType, $formKeys),
        );
    }
}