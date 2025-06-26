<?php

namespace Symfony\Config\SuluHttpCache;

require_once __DIR__.\DIRECTORY_SEPARATOR.'ProxyClient'.\DIRECTORY_SEPARATOR.'SymfonyConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ProxyClient'.\DIRECTORY_SEPARATOR.'VarnishConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ProxyClientConfig 
{
    private $noop;
    private $symfony;
    private $varnish;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function noop($value): static
    {
        $this->_usedProperties['noop'] = true;
        $this->noop = $value;

        return $this;
    }

    /**
     * @template TValue
     * @param TValue $value
     * @default {"enabled":false,"servers":[],"base_url":null}
     * @return \Symfony\Config\SuluHttpCache\ProxyClient\SymfonyConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\SuluHttpCache\ProxyClient\SymfonyConfig : static)
     */
    public function symfony(array $value = []): \Symfony\Config\SuluHttpCache\ProxyClient\SymfonyConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['symfony'] = true;
            $this->symfony = $value;

            return $this;
        }

        if (!$this->symfony instanceof \Symfony\Config\SuluHttpCache\ProxyClient\SymfonyConfig) {
            $this->_usedProperties['symfony'] = true;
            $this->symfony = new \Symfony\Config\SuluHttpCache\ProxyClient\SymfonyConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "symfony()" has already been initialized. You cannot pass values the second time you call symfony().');
        }

        return $this->symfony;
    }

    /**
     * @template TValue
     * @param TValue $value
     * @default {"enabled":false,"servers":[],"base_url":null,"tag_mode":"ban"}
     * @return \Symfony\Config\SuluHttpCache\ProxyClient\VarnishConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\SuluHttpCache\ProxyClient\VarnishConfig : static)
     */
    public function varnish(array $value = []): \Symfony\Config\SuluHttpCache\ProxyClient\VarnishConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['varnish'] = true;
            $this->varnish = $value;

            return $this;
        }

        if (!$this->varnish instanceof \Symfony\Config\SuluHttpCache\ProxyClient\VarnishConfig) {
            $this->_usedProperties['varnish'] = true;
            $this->varnish = new \Symfony\Config\SuluHttpCache\ProxyClient\VarnishConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "varnish()" has already been initialized. You cannot pass values the second time you call varnish().');
        }

        return $this->varnish;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('noop', $value)) {
            $this->_usedProperties['noop'] = true;
            $this->noop = $value['noop'];
            unset($value['noop']);
        }

        if (array_key_exists('symfony', $value)) {
            $this->_usedProperties['symfony'] = true;
            $this->symfony = \is_array($value['symfony']) ? new \Symfony\Config\SuluHttpCache\ProxyClient\SymfonyConfig($value['symfony']) : $value['symfony'];
            unset($value['symfony']);
        }

        if (array_key_exists('varnish', $value)) {
            $this->_usedProperties['varnish'] = true;
            $this->varnish = \is_array($value['varnish']) ? new \Symfony\Config\SuluHttpCache\ProxyClient\VarnishConfig($value['varnish']) : $value['varnish'];
            unset($value['varnish']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['noop'])) {
            $output['noop'] = $this->noop;
        }
        if (isset($this->_usedProperties['symfony'])) {
            $output['symfony'] = $this->symfony instanceof \Symfony\Config\SuluHttpCache\ProxyClient\SymfonyConfig ? $this->symfony->toArray() : $this->symfony;
        }
        if (isset($this->_usedProperties['varnish'])) {
            $output['varnish'] = $this->varnish instanceof \Symfony\Config\SuluHttpCache\ProxyClient\VarnishConfig ? $this->varnish->toArray() : $this->varnish;
        }

        return $output;
    }

}
