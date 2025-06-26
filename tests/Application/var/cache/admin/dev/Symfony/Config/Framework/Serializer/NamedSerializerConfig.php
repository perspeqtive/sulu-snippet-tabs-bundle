<?php

namespace Symfony\Config\Framework\Serializer;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class NamedSerializerConfig 
{
    private $nameConverter;
    private $defaultContext;
    private $includeBuiltInNormalizers;
    private $includeBuiltInEncoders;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function nameConverter($value): static
    {
        $this->_usedProperties['nameConverter'] = true;
        $this->nameConverter = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function defaultContext(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['defaultContext'] = true;
        $this->defaultContext = $value;

        return $this;
    }

    /**
     * Whether to include the built-in normalizers
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function includeBuiltInNormalizers($value): static
    {
        $this->_usedProperties['includeBuiltInNormalizers'] = true;
        $this->includeBuiltInNormalizers = $value;

        return $this;
    }

    /**
     * Whether to include the built-in encoders
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function includeBuiltInEncoders($value): static
    {
        $this->_usedProperties['includeBuiltInEncoders'] = true;
        $this->includeBuiltInEncoders = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('name_converter', $value)) {
            $this->_usedProperties['nameConverter'] = true;
            $this->nameConverter = $value['name_converter'];
            unset($value['name_converter']);
        }

        if (array_key_exists('default_context', $value)) {
            $this->_usedProperties['defaultContext'] = true;
            $this->defaultContext = $value['default_context'];
            unset($value['default_context']);
        }

        if (array_key_exists('include_built_in_normalizers', $value)) {
            $this->_usedProperties['includeBuiltInNormalizers'] = true;
            $this->includeBuiltInNormalizers = $value['include_built_in_normalizers'];
            unset($value['include_built_in_normalizers']);
        }

        if (array_key_exists('include_built_in_encoders', $value)) {
            $this->_usedProperties['includeBuiltInEncoders'] = true;
            $this->includeBuiltInEncoders = $value['include_built_in_encoders'];
            unset($value['include_built_in_encoders']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['nameConverter'])) {
            $output['name_converter'] = $this->nameConverter;
        }
        if (isset($this->_usedProperties['defaultContext'])) {
            $output['default_context'] = $this->defaultContext;
        }
        if (isset($this->_usedProperties['includeBuiltInNormalizers'])) {
            $output['include_built_in_normalizers'] = $this->includeBuiltInNormalizers;
        }
        if (isset($this->_usedProperties['includeBuiltInEncoders'])) {
            $output['include_built_in_encoders'] = $this->includeBuiltInEncoders;
        }

        return $output;
    }

}
