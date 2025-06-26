<?php

namespace Symfony\Config\Framework\Translator;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class GlobalConfig 
{
    private $value;
    private $message;
    private $parameters;
    private $domain;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function value(mixed $value): static
    {
        $this->_usedProperties['value'] = true;
        $this->value = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function message($value): static
    {
        $this->_usedProperties['message'] = true;
        $this->message = $value;

        return $this;
    }

    /**
     * @return $this
     */
    public function parameter(string $name, mixed $value): static
    {
        $this->_usedProperties['parameters'] = true;
        $this->parameters[$name] = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function domain($value): static
    {
        $this->_usedProperties['domain'] = true;
        $this->domain = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('value', $value)) {
            $this->_usedProperties['value'] = true;
            $this->value = $value['value'];
            unset($value['value']);
        }

        if (array_key_exists('message', $value)) {
            $this->_usedProperties['message'] = true;
            $this->message = $value['message'];
            unset($value['message']);
        }

        if (array_key_exists('parameters', $value)) {
            $this->_usedProperties['parameters'] = true;
            $this->parameters = $value['parameters'];
            unset($value['parameters']);
        }

        if (array_key_exists('domain', $value)) {
            $this->_usedProperties['domain'] = true;
            $this->domain = $value['domain'];
            unset($value['domain']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['value'])) {
            $output['value'] = $this->value;
        }
        if (isset($this->_usedProperties['message'])) {
            $output['message'] = $this->message;
        }
        if (isset($this->_usedProperties['parameters'])) {
            $output['parameters'] = $this->parameters;
        }
        if (isset($this->_usedProperties['domain'])) {
            $output['domain'] = $this->domain;
        }

        return $output;
    }

}
