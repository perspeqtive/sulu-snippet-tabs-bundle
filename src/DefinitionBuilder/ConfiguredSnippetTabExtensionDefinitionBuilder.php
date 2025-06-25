<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\DefinitionBuilder;

use PERSPEQTIVE\SuluSnippetTabsBundle\Extension\SnippetTabExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class ConfiguredSnippetTabExtensionDefinitionBuilder
{
    /**
     * @param string[] $formKeys
     */
    public function build(ContainerBuilder $container, string $snippetType, array $formKeys): Definition
    {
        $definition = new Definition(SnippetTabExtension::class);
        $definition->setArgument('$formMetaDataLoader', $container->getDefinition('sulu_admin.xml_form_metadata_loader'));
        $definition->setArgument('$name', $snippetType);
        $definition->setArgument('$forms', $formKeys);
        $definition->addTag('sulu.structure.extension');

        return $definition;
    }
}
