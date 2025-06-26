<?php

namespace Symfony\Config\SuluDocumentManager\MappingConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class MappingConfig 
{
    private $encoding;
    private $property;
    private $type;
    private $mapped;
    private $multiple;
    private $default;
    private $_usedProperties = [];

    /**
     * @default 'content'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function encoding($value): static
    {
        $this->_usedProperties['encoding'] = true;
        $this->encoding = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function property($value): static
    {
        $this->_usedProperties['property'] = true;
        $this->property = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function type($value): static
    {
        $this->_usedProperties['type'] = true;
        $this->type = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function mapped($value): static
    {
        $this->_usedProperties['mapped'] = true;
        $this->mapped = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function multiple($value): static
    {
        $this->_usedProperties['multiple'] = true;
        $this->multiple = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function default($value): static
    {
        $this->_usedProperties['default'] = true;
        $this->default = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('encoding', $value)) {
            $this->_usedProperties['encoding'] = true;
            $this->encoding = $value['encoding'];
            unset($value['encoding']);
        }

        if (array_key_exists('property', $value)) {
            $this->_usedProperties['property'] = true;
            $this->property = $value['property'];
            unset($value['property']);
        }

        if (array_key_exists('type', $value)) {
            $this->_usedProperties['type'] = true;
            $this->type = $value['type'];
            unset($value['type']);
        }

        if (array_key_exists('mapped', $value)) {
            $this->_usedProperties['mapped'] = true;
            $this->mapped = $value['mapped'];
            unset($value['mapped']);
        }

        if (array_key_exists('multiple', $value)) {
            $this->_usedProperties['multiple'] = true;
            $this->multiple = $value['multiple'];
            unset($value['multiple']);
        }

        if (array_key_exists('default', $value)) {
            $this->_usedProperties['default'] = true;
            $this->default = $value['default'];
            unset($value['default']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['encoding'])) {
            $output['encoding'] = $this->encoding;
        }
        if (isset($this->_usedProperties['property'])) {
            $output['property'] = $this->property;
        }
        if (isset($this->_usedProperties['type'])) {
            $output['type'] = $this->type;
        }
        if (isset($this->_usedProperties['mapped'])) {
            $output['mapped'] = $this->mapped;
        }
        if (isset($this->_usedProperties['multiple'])) {
            $output['multiple'] = $this->multiple;
        }
        if (isset($this->_usedProperties['default'])) {
            $output['default'] = $this->default;
        }

        return $output;
    }

}
