<?php

namespace Symfony\Config\FosHttpCache\ProxyClient;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Cloudflare'.\DIRECTORY_SEPARATOR.'HttpConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class CloudflareConfig 
{
    private $authenticationToken;
    private $zoneIdentifier;
    private $http;
    private $_usedProperties = [];

    /**
     * API authorization token, requires Zone.Cache Purge permissions
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function authenticationToken($value): static
    {
        $this->_usedProperties['authenticationToken'] = true;
        $this->authenticationToken = $value;

        return $this;
    }

    /**
     * Identifier for your Cloudflare zone you want to purge the cache for
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function zoneIdentifier($value): static
    {
        $this->_usedProperties['zoneIdentifier'] = true;
        $this->zoneIdentifier = $value;

        return $this;
    }

    /**
     * @default {"servers":["https:\/\/api.cloudflare.com"],"http_client":null}
    */
    public function http(array $value = []): \Symfony\Config\FosHttpCache\ProxyClient\Cloudflare\HttpConfig
    {
        if (null === $this->http) {
            $this->_usedProperties['http'] = true;
            $this->http = new \Symfony\Config\FosHttpCache\ProxyClient\Cloudflare\HttpConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "http()" has already been initialized. You cannot pass values the second time you call http().');
        }

        return $this->http;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('authentication_token', $value)) {
            $this->_usedProperties['authenticationToken'] = true;
            $this->authenticationToken = $value['authentication_token'];
            unset($value['authentication_token']);
        }

        if (array_key_exists('zone_identifier', $value)) {
            $this->_usedProperties['zoneIdentifier'] = true;
            $this->zoneIdentifier = $value['zone_identifier'];
            unset($value['zone_identifier']);
        }

        if (array_key_exists('http', $value)) {
            $this->_usedProperties['http'] = true;
            $this->http = new \Symfony\Config\FosHttpCache\ProxyClient\Cloudflare\HttpConfig($value['http']);
            unset($value['http']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['authenticationToken'])) {
            $output['authentication_token'] = $this->authenticationToken;
        }
        if (isset($this->_usedProperties['zoneIdentifier'])) {
            $output['zone_identifier'] = $this->zoneIdentifier;
        }
        if (isset($this->_usedProperties['http'])) {
            $output['http'] = $this->http->toArray();
        }

        return $output;
    }

}
