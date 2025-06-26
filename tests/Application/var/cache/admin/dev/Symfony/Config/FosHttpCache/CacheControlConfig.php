<?php

namespace Symfony\Config\FosHttpCache;

require_once __DIR__.\DIRECTORY_SEPARATOR.'CacheControl'.\DIRECTORY_SEPARATOR.'DefaultsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'CacheControl'.\DIRECTORY_SEPARATOR.'RuleConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;

/**
 * This class is automatically generated to help in creating a config.
 */
class CacheControlConfig 
{
    private $defaults;
    private $ttlHeader;
    private $rules;
    private $_usedProperties = [];

    /**
     * @default {"overwrite":false}
    */
    public function defaults(array $value = []): \Symfony\Config\FosHttpCache\CacheControl\DefaultsConfig
    {
        if (null === $this->defaults) {
            $this->_usedProperties['defaults'] = true;
            $this->defaults = new \Symfony\Config\FosHttpCache\CacheControl\DefaultsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "defaults()" has already been initialized. You cannot pass values the second time you call defaults().');
        }

        return $this->defaults;
    }

    /**
     * Specify the header name to use with the cache_control.reverse_proxy_ttl setting
     * @default 'X-Reverse-Proxy-TTL'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function ttlHeader($value): static
    {
        $this->_usedProperties['ttlHeader'] = true;
        $this->ttlHeader = $value;

        return $this;
    }

    public function rule(array $value = []): \Symfony\Config\FosHttpCache\CacheControl\RuleConfig
    {
        $this->_usedProperties['rules'] = true;

        return $this->rules[] = new \Symfony\Config\FosHttpCache\CacheControl\RuleConfig($value);
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('defaults', $value)) {
            $this->_usedProperties['defaults'] = true;
            $this->defaults = new \Symfony\Config\FosHttpCache\CacheControl\DefaultsConfig($value['defaults']);
            unset($value['defaults']);
        }

        if (array_key_exists('ttl_header', $value)) {
            $this->_usedProperties['ttlHeader'] = true;
            $this->ttlHeader = $value['ttl_header'];
            unset($value['ttl_header']);
        }

        if (array_key_exists('rules', $value)) {
            $this->_usedProperties['rules'] = true;
            $this->rules = array_map(fn ($v) => new \Symfony\Config\FosHttpCache\CacheControl\RuleConfig($v), $value['rules']);
            unset($value['rules']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['defaults'])) {
            $output['defaults'] = $this->defaults->toArray();
        }
        if (isset($this->_usedProperties['ttlHeader'])) {
            $output['ttl_header'] = $this->ttlHeader;
        }
        if (isset($this->_usedProperties['rules'])) {
            $output['rules'] = array_map(fn ($v) => $v->toArray(), $this->rules);
        }

        return $output;
    }

}
