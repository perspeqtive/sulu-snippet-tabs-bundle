<?php

namespace Symfony\Config\FosHttpCache\ProxyClient\Varnish;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class HttpConfig 
{
    private $servers;
    private $serversFromJsonenv;
    private $baseUrl;
    private $httpClient;
    private $requestFactory;
    private $streamFactory;
    private $_usedProperties = [];

    /**
     * @return $this
     */
    public function server(string $name, mixed $value): static
    {
        $this->_usedProperties['servers'] = true;
        $this->servers[$name] = $value;

        return $this;
    }

    /**
     * Addresses of the hosts the caching proxy is running on (env var that contains a json array as a string). The values may be hostnames or ips, and with :port if not the default port 80.
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function serversFromJsonenv(mixed $value): static
    {
        $this->_usedProperties['serversFromJsonenv'] = true;
        $this->serversFromJsonenv = $value;

        return $this;
    }

    /**
     * Default host name and optional path for path based invalidation.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function baseUrl($value): static
    {
        $this->_usedProperties['baseUrl'] = true;
        $this->baseUrl = $value;

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

    /**
     * Service name of PSR-17 message factory.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function requestFactory($value): static
    {
        $this->_usedProperties['requestFactory'] = true;
        $this->requestFactory = $value;

        return $this;
    }

    /**
     * Service name of PSR-17 stream factory.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function streamFactory($value): static
    {
        $this->_usedProperties['streamFactory'] = true;
        $this->streamFactory = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('servers', $value)) {
            $this->_usedProperties['servers'] = true;
            $this->servers = $value['servers'];
            unset($value['servers']);
        }

        if (array_key_exists('servers_from_jsonenv', $value)) {
            $this->_usedProperties['serversFromJsonenv'] = true;
            $this->serversFromJsonenv = $value['servers_from_jsonenv'];
            unset($value['servers_from_jsonenv']);
        }

        if (array_key_exists('base_url', $value)) {
            $this->_usedProperties['baseUrl'] = true;
            $this->baseUrl = $value['base_url'];
            unset($value['base_url']);
        }

        if (array_key_exists('http_client', $value)) {
            $this->_usedProperties['httpClient'] = true;
            $this->httpClient = $value['http_client'];
            unset($value['http_client']);
        }

        if (array_key_exists('request_factory', $value)) {
            $this->_usedProperties['requestFactory'] = true;
            $this->requestFactory = $value['request_factory'];
            unset($value['request_factory']);
        }

        if (array_key_exists('stream_factory', $value)) {
            $this->_usedProperties['streamFactory'] = true;
            $this->streamFactory = $value['stream_factory'];
            unset($value['stream_factory']);
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
        if (isset($this->_usedProperties['serversFromJsonenv'])) {
            $output['servers_from_jsonenv'] = $this->serversFromJsonenv;
        }
        if (isset($this->_usedProperties['baseUrl'])) {
            $output['base_url'] = $this->baseUrl;
        }
        if (isset($this->_usedProperties['httpClient'])) {
            $output['http_client'] = $this->httpClient;
        }
        if (isset($this->_usedProperties['requestFactory'])) {
            $output['request_factory'] = $this->requestFactory;
        }
        if (isset($this->_usedProperties['streamFactory'])) {
            $output['stream_factory'] = $this->streamFactory;
        }

        return $output;
    }

}
