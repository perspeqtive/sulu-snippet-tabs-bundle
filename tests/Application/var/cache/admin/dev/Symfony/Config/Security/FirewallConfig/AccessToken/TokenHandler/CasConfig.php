<?php

namespace Symfony\Config\Security\FirewallConfig\AccessToken\TokenHandler;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class CasConfig 
{
    private $validationUrl;
    private $prefix;
    private $httpClient;
    private $_usedProperties = [];

    /**
     * CAS server validation URL
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function validationUrl($value): static
    {
        $this->_usedProperties['validationUrl'] = true;
        $this->validationUrl = $value;

        return $this;
    }

    /**
     * CAS prefix
     * @default 'cas'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function prefix($value): static
    {
        $this->_usedProperties['prefix'] = true;
        $this->prefix = $value;

        return $this;
    }

    /**
     * HTTP Client service
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function httpClient($value): static
    {
        $this->_usedProperties['httpClient'] = true;
        $this->httpClient = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('validation_url', $value)) {
            $this->_usedProperties['validationUrl'] = true;
            $this->validationUrl = $value['validation_url'];
            unset($value['validation_url']);
        }

        if (array_key_exists('prefix', $value)) {
            $this->_usedProperties['prefix'] = true;
            $this->prefix = $value['prefix'];
            unset($value['prefix']);
        }

        if (array_key_exists('http_client', $value)) {
            $this->_usedProperties['httpClient'] = true;
            $this->httpClient = $value['http_client'];
            unset($value['http_client']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['validationUrl'])) {
            $output['validation_url'] = $this->validationUrl;
        }
        if (isset($this->_usedProperties['prefix'])) {
            $output['prefix'] = $this->prefix;
        }
        if (isset($this->_usedProperties['httpClient'])) {
            $output['http_client'] = $this->httpClient;
        }

        return $output;
    }

}
