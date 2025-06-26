<?php

namespace Symfony\Config\SuluRoute;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class MappingsConfig 
{
    private $generator;
    private $options;
    private $resourceKey;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function generator($value): static
    {
        $this->_usedProperties['generator'] = true;
        $this->generator = $value;

        return $this;
    }

    /**
     * @return $this
     */
    public function options(string $name, mixed $value): static
    {
        $this->_usedProperties['options'] = true;
        $this->options[$name] = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function resourceKey($value): static
    {
        $this->_usedProperties['resourceKey'] = true;
        $this->resourceKey = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('generator', $value)) {
            $this->_usedProperties['generator'] = true;
            $this->generator = $value['generator'];
            unset($value['generator']);
        }

        if (array_key_exists('options', $value)) {
            $this->_usedProperties['options'] = true;
            $this->options = $value['options'];
            unset($value['options']);
        }

        if (array_key_exists('resource_key', $value)) {
            $this->_usedProperties['resourceKey'] = true;
            $this->resourceKey = $value['resource_key'];
            unset($value['resource_key']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['generator'])) {
            $output['generator'] = $this->generator;
        }
        if (isset($this->_usedProperties['options'])) {
            $output['options'] = $this->options;
        }
        if (isset($this->_usedProperties['resourceKey'])) {
            $output['resource_key'] = $this->resourceKey;
        }

        return $output;
    }

}
