<?php

namespace Symfony\Config\FosHttpCache\ProxyClient\Cloudflare;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class HttpConfig 
{
    private $servers;
    private $httpClient;
    private $_usedProperties = [];

    /**
     * @return $this
     */
    public function servers(string $name, mixed $value): static
    {
        $this->_usedProperties['servers'] = true;
        $this->servers[$name] = $value;

        return $this;
    }

    /**
     * Httplug async client service name to use for sending the requests.
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
        if (array_key_exists('servers', $value)) {
            $this->_usedProperties['servers'] = true;
            $this->servers = $value['servers'];
            unset($value['servers']);
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
        if (isset($this->_usedProperties['servers'])) {
            $output['servers'] = $this->servers;
        }
        if (isset($this->_usedProperties['httpClient'])) {
            $output['http_client'] = $this->httpClient;
        }

        return $output;
    }

}
