<?php

declare(strict_types=1);

namespace PERSPEQTIVE\SuluSnippetTabsBundle\Tests\Unit\DefinitionBuilder;

use PERSPEQTIVE\SuluSnippetTabsBundle\DefinitionBuilder\ConfiguredSnippetTabExtensionDefinitionBuilder;
use PERSPEQTIVE\SuluSnippetTabsBundle\Extension\SnippetTabExtension;
use PHPUnit\Framework\TestCase;
use Sulu\Bundle\AdminBundle\Metadata\FormMetadata\XmlFormMetadataLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class ConfiguredSnippetTabExtensionDefinitionBuilderTest extends TestCase
{
    public function testBuild(): void
    {
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->addDefinitions([
            'sulu_admin.xml_form_metadata_loader' => new Definition(XmlFormMetadataLoader::class),
        ]);

        $builder = new ConfiguredSnippetTabExtensionDefinitionBuilder();
        $result = $builder->build($containerBuilder, 'shop', ['settings', 'business_hours']);

        self::assertEquals(SnippetTabExtension::class, $result->getClass());
        self::assertEquals(['sulu.structure.extension' => [[]]], $result->getTags());
        self::assertEquals('shop', $result->getArgument('$name'));
        self::assertEquals(['settings', 'business_hours'], $result->getArgument('$forms'));
    }
}
