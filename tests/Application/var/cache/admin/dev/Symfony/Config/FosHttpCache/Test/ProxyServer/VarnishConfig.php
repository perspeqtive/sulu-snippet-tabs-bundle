<?php

namespace Symfony\Config\FosHttpCache\Test\ProxyServer;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class VarnishConfig 
{
    private $configFile;
    private $binary;
    private $port;
    private $ip;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function configFile($value): static
    {
        $this->_usedProperties['configFile'] = true;
        $this->configFile = $value;

        return $this;
    }

    /**
     * @default 'varnishd'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function binary($value): static
    {
        $this->_usedProperties['binary'] = true;
        $this->binary = $value;

        return $this;
    }

    /**
     * @default 6181
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function port($value): static
    {
        $this->_usedProperties['port'] = true;
        $this->port = $value;

        return $this;
    }

    /**
     * @default '127.0.0.1'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function ip($value): static
    {
        $this->_usedProperties['ip'] = true;
        $this->ip = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('config_file', $value)) {
            $this->_usedProperties['configFile'] = true;
            $this->configFile = $value['config_file'];
            unset($value['config_file']);
        }

        if (array_key_exists('binary', $value)) {
            $this->_usedProperties['binary'] = true;
            $this->binary = $value['binary'];
            unset($value['binary']);
        }

        if (array_key_exists('port', $value)) {
            $this->_usedProperties['port'] = true;
            $this->port = $value['port'];
            unset($value['port']);
        }

        if (array_key_exists('ip', $value)) {
            $this->_usedProperties['ip'] = true;
            $this->ip = $value['ip'];
            unset($value['ip']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['configFile'])) {
            $output['config_file'] = $this->configFile;
        }
        if (isset($this->_usedProperties['binary'])) {
            $output['binary'] = $this->binary;
        }
        if (isset($this->_usedProperties['port'])) {
            $output['port'] = $this->port;
        }
        if (isset($this->_usedProperties['ip'])) {
            $output['ip'] = $this->ip;
        }

        return $output;
    }

}
