<?php

namespace Symfony\Config\DoctrinePhpcr\Session\SessionConfig;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Backend'.\DIRECTORY_SEPARATOR.'CachesConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class BackendConfig 
{
    private $type;
    private $factory;
    private $logging;
    private $profiling;
    private $backtrace;
    private $parameters;
    private $curlOptions;
    private $url;
    private $connection;
    private $caches;
    private $_usedProperties = [];

    /**
     * @default 'jackrabbit'
     * @param ParamConfigurator|'jackrabbit'|'doctrinedbal'|'prismic' $value
     * @return $this
     */
    public function type($value): static
    {
        $this->_usedProperties['type'] = true;
        $this->type = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function factory($value): static
    {
        $this->_usedProperties['factory'] = true;
        $this->factory = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function logging($value): static
    {
        $this->_usedProperties['logging'] = true;
        $this->logging = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function profiling($value): static
    {
        $this->_usedProperties['profiling'] = true;
        $this->profiling = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function backtrace($value): static
    {
        $this->_usedProperties['backtrace'] = true;
        $this->backtrace = $value;

        return $this;
    }

    /**
     * @return $this
     */
    public function parameter(string $key, mixed $value): static
    {
        $this->_usedProperties['parameters'] = true;
        $this->parameters[$key] = $value;

        return $this;
    }

    /**
     * @return $this
     */
    public function curlOptions(string $key, mixed $value): static
    {
        $this->_usedProperties['curlOptions'] = true;
        $this->curlOptions[$key] = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function url($value): static
    {
        $this->_usedProperties['url'] = true;
        $this->url = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function connection($value): static
    {
        $this->_usedProperties['connection'] = true;
        $this->connection = $value;

        return $this;
    }

    public function caches(array $value = []): \Symfony\Config\DoctrinePhpcr\Session\SessionConfig\Backend\CachesConfig
    {
        if (null === $this->caches) {
            $this->_usedProperties['caches'] = true;
            $this->caches = new \Symfony\Config\DoctrinePhpcr\Session\SessionConfig\Backend\CachesConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "caches()" has already been initialized. You cannot pass values the second time you call caches().');
        }

        return $this->caches;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('type', $value)) {
            $this->_usedProperties['type'] = true;
            $this->type = $value['type'];
            unset($value['type']);
        }

        if (array_key_exists('factory', $value)) {
            $this->_usedProperties['factory'] = true;
            $this->factory = $value['factory'];
            unset($value['factory']);
        }

        if (array_key_exists('logging', $value)) {
            $this->_usedProperties['logging'] = true;
            $this->logging = $value['logging'];
            unset($value['logging']);
        }

        if (array_key_exists('profiling', $value)) {
            $this->_usedProperties['profiling'] = true;
            $this->profiling = $value['profiling'];
            unset($value['profiling']);
        }

        if (array_key_exists('backtrace', $value)) {
            $this->_usedProperties['backtrace'] = true;
            $this->backtrace = $value['backtrace'];
            unset($value['backtrace']);
        }

        if (array_key_exists('parameters', $value)) {
            $this->_usedProperties['parameters'] = true;
            $this->parameters = $value['parameters'];
            unset($value['parameters']);
        }

        if (array_key_exists('curl_options', $value)) {
            $this->_usedProperties['curlOptions'] = true;
            $this->curlOptions = $value['curl_options'];
            unset($value['curl_options']);
        }

        if (array_key_exists('url', $value)) {
            $this->_usedProperties['url'] = true;
            $this->url = $value['url'];
            unset($value['url']);
        }

        if (array_key_exists('connection', $value)) {
            $this->_usedProperties['connection'] = true;
            $this->connection = $value['connection'];
            unset($value['connection']);
        }

        if (array_key_exists('caches', $value)) {
            $this->_usedProperties['caches'] = true;
            $this->caches = new \Symfony\Config\DoctrinePhpcr\Session\SessionConfig\Backend\CachesConfig($value['caches']);
            unset($value['caches']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['type'])) {
            $output['type'] = $this->type;
        }
        if (isset($this->_usedProperties['factory'])) {
            $output['factory'] = $this->factory;
        }
        if (isset($this->_usedProperties['logging'])) {
            $output['logging'] = $this->logging;
        }
        if (isset($this->_usedProperties['profiling'])) {
            $output['profiling'] = $this->profiling;
        }
        if (isset($this->_usedProperties['backtrace'])) {
            $output['backtrace'] = $this->backtrace;
        }
        if (isset($this->_usedProperties['parameters'])) {
            $output['parameters'] = $this->parameters;
        }
        if (isset($this->_usedProperties['curlOptions'])) {
            $output['curl_options'] = $this->curlOptions;
        }
        if (isset($this->_usedProperties['url'])) {
            $output['url'] = $this->url;
        }
        if (isset($this->_usedProperties['connection'])) {
            $output['connection'] = $this->connection;
        }
        if (isset($this->_usedProperties['caches'])) {
            $output['caches'] = $this->caches->toArray();
        }

        return $output;
    }

}
