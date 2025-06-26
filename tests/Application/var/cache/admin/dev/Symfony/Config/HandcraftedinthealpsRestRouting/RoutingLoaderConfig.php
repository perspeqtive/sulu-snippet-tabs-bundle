<?php

namespace Symfony\Config\HandcraftedinthealpsRestRouting;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class RoutingLoaderConfig 
{
    private $defaultFormat;
    private $prefixMethods;
    private $includeFormat;
    private $formats;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultFormat($value): static
    {
        $this->_usedProperties['defaultFormat'] = true;
        $this->defaultFormat = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function prefixMethods($value): static
    {
        $this->_usedProperties['prefixMethods'] = true;
        $this->prefixMethods = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function includeFormat($value): static
    {
        $this->_usedProperties['includeFormat'] = true;
        $this->includeFormat = $value;

        return $this;
    }

    /**
     * @return $this
     */
    public function formats(string $name, ParamConfigurator|bool $value): static
    {
        $this->_usedProperties['formats'] = true;
        $this->formats[$name] = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('default_format', $value)) {
            $this->_usedProperties['defaultFormat'] = true;
            $this->defaultFormat = $value['default_format'];
            unset($value['default_format']);
        }

        if (array_key_exists('prefix_methods', $value)) {
            $this->_usedProperties['prefixMethods'] = true;
            $this->prefixMethods = $value['prefix_methods'];
            unset($value['prefix_methods']);
        }

        if (array_key_exists('include_format', $value)) {
            $this->_usedProperties['includeFormat'] = true;
            $this->includeFormat = $value['include_format'];
            unset($value['include_format']);
        }

        if (array_key_exists('formats', $value)) {
            $this->_usedProperties['formats'] = true;
            $this->formats = $value['formats'];
            unset($value['formats']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['defaultFormat'])) {
            $output['default_format'] = $this->defaultFormat;
        }
        if (isset($this->_usedProperties['prefixMethods'])) {
            $output['prefix_methods'] = $this->prefixMethods;
        }
        if (isset($this->_usedProperties['includeFormat'])) {
            $output['include_format'] = $this->includeFormat;
        }
        if (isset($this->_usedProperties['formats'])) {
            $output['formats'] = $this->formats;
        }

        return $output;
    }

}
