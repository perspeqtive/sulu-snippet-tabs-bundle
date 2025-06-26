<?php

namespace Symfony\Config\SuluCore\Content;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Structure'.\DIRECTORY_SEPARATOR.'PathsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class StructureConfig 
{
    private $defaultType;
    private $requiredProperties;
    private $requiredTags;
    private $paths;
    private $typeMap;
    private $_usedProperties = [];

    /**
     * @return $this
     */
    public function defaultType(string $name, mixed $value): static
    {
        $this->_usedProperties['defaultType'] = true;
        $this->defaultType[$name] = $value;

        return $this;
    }

    /**
     * @return $this
     */
    public function requiredProperties(string $type, ParamConfigurator|array $value): static
    {
        $this->_usedProperties['requiredProperties'] = true;
        $this->requiredProperties[$type] = $value;

        return $this;
    }

    /**
     * @return $this
     */
    public function requiredTags(string $type, ParamConfigurator|array $value): static
    {
        $this->_usedProperties['requiredTags'] = true;
        $this->requiredTags[$type] = $value;

        return $this;
    }

    public function paths(array $value = []): \Symfony\Config\SuluCore\Content\Structure\PathsConfig
    {
        $this->_usedProperties['paths'] = true;

        return $this->paths[] = new \Symfony\Config\SuluCore\Content\Structure\PathsConfig($value);
    }

    /**
     * @return $this
     */
    public function typeMap(string $name, mixed $value): static
    {
        $this->_usedProperties['typeMap'] = true;
        $this->typeMap[$name] = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('default_type', $value)) {
            $this->_usedProperties['defaultType'] = true;
            $this->defaultType = $value['default_type'];
            unset($value['default_type']);
        }

        if (array_key_exists('required_properties', $value)) {
            $this->_usedProperties['requiredProperties'] = true;
            $this->requiredProperties = $value['required_properties'];
            unset($value['required_properties']);
        }

        if (array_key_exists('required_tags', $value)) {
            $this->_usedProperties['requiredTags'] = true;
            $this->requiredTags = $value['required_tags'];
            unset($value['required_tags']);
        }

        if (array_key_exists('paths', $value)) {
            $this->_usedProperties['paths'] = true;
            $this->paths = array_map(fn ($v) => new \Symfony\Config\SuluCore\Content\Structure\PathsConfig($v), $value['paths']);
            unset($value['paths']);
        }

        if (array_key_exists('type_map', $value)) {
            $this->_usedProperties['typeMap'] = true;
            $this->typeMap = $value['type_map'];
            unset($value['type_map']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['defaultType'])) {
            $output['default_type'] = $this->defaultType;
        }
        if (isset($this->_usedProperties['requiredProperties'])) {
            $output['required_properties'] = $this->requiredProperties;
        }
        if (isset($this->_usedProperties['requiredTags'])) {
            $output['required_tags'] = $this->requiredTags;
        }
        if (isset($this->_usedProperties['paths'])) {
            $output['paths'] = array_map(fn ($v) => $v->toArray(), $this->paths);
        }
        if (isset($this->_usedProperties['typeMap'])) {
            $output['type_map'] = $this->typeMap;
        }

        return $output;
    }

}
