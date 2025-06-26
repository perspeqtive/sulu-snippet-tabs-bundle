<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluRoute'.\DIRECTORY_SEPARATOR.'MappingsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluRoute'.\DIRECTORY_SEPARATOR.'ContentTypesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluRoute'.\DIRECTORY_SEPARATOR.'ObjectsConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SuluRouteConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $mappings;
    private $contentTypes;
    private $objects;
    private $_usedProperties = [];

    public function mappings(string $className, array $value = []): \Symfony\Config\SuluRoute\MappingsConfig
    {
        if (!isset($this->mappings[$className])) {
            $this->_usedProperties['mappings'] = true;
            $this->mappings[$className] = new \Symfony\Config\SuluRoute\MappingsConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "mappings()" has already been initialized. You cannot pass values the second time you call mappings().');
        }

        return $this->mappings[$className];
    }

    /**
     * @default {"page_tree_route":{"page_route_cascade":"request"}}
    */
    public function contentTypes(array $value = []): \Symfony\Config\SuluRoute\ContentTypesConfig
    {
        if (null === $this->contentTypes) {
            $this->_usedProperties['contentTypes'] = true;
            $this->contentTypes = new \Symfony\Config\SuluRoute\ContentTypesConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "contentTypes()" has already been initialized. You cannot pass values the second time you call contentTypes().');
        }

        return $this->contentTypes;
    }

    /**
     * @default {"route":{"model":"Sulu\\Bundle\\RouteBundle\\Entity\\Route","repository":"Sulu\\Bundle\\RouteBundle\\Entity\\RouteRepository"}}
    */
    public function objects(array $value = []): \Symfony\Config\SuluRoute\ObjectsConfig
    {
        if (null === $this->objects) {
            $this->_usedProperties['objects'] = true;
            $this->objects = new \Symfony\Config\SuluRoute\ObjectsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "objects()" has already been initialized. You cannot pass values the second time you call objects().');
        }

        return $this->objects;
    }

    public function getExtensionAlias(): string
    {
        return 'sulu_route';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('mappings', $value)) {
            $this->_usedProperties['mappings'] = true;
            $this->mappings = array_map(fn ($v) => new \Symfony\Config\SuluRoute\MappingsConfig($v), $value['mappings']);
            unset($value['mappings']);
        }

        if (array_key_exists('content_types', $value)) {
            $this->_usedProperties['contentTypes'] = true;
            $this->contentTypes = new \Symfony\Config\SuluRoute\ContentTypesConfig($value['content_types']);
            unset($value['content_types']);
        }

        if (array_key_exists('objects', $value)) {
            $this->_usedProperties['objects'] = true;
            $this->objects = new \Symfony\Config\SuluRoute\ObjectsConfig($value['objects']);
            unset($value['objects']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['mappings'])) {
            $output['mappings'] = array_map(fn ($v) => $v->toArray(), $this->mappings);
        }
        if (isset($this->_usedProperties['contentTypes'])) {
            $output['content_types'] = $this->contentTypes->toArray();
        }
        if (isset($this->_usedProperties['objects'])) {
            $output['objects'] = $this->objects->toArray();
        }

        return $output;
    }

}
