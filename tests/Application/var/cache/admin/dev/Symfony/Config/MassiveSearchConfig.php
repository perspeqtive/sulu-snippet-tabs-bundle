<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'MassiveSearch'.\DIRECTORY_SEPARATOR.'ServicesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'MassiveSearch'.\DIRECTORY_SEPARATOR.'AdaptersConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'MassiveSearch'.\DIRECTORY_SEPARATOR.'MetadataConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'MassiveSearch'.\DIRECTORY_SEPARATOR.'PersistenceConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;

/**
 * This class is automatically generated to help in creating a config.
 */
class MassiveSearchConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $services;
    private $adapter;
    private $adapters;
    private $metadata;
    private $persistence;
    private $_usedProperties = [];

    /**
     * @default {"factory":"massive_search.factory_default"}
    */
    public function services(array $value = []): \Symfony\Config\MassiveSearch\ServicesConfig
    {
        if (null === $this->services) {
            $this->_usedProperties['services'] = true;
            $this->services = new \Symfony\Config\MassiveSearch\ServicesConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "services()" has already been initialized. You cannot pass values the second time you call services().');
        }

        return $this->services;
    }

    /**
     * @default 'zend_lucene'
     * @param ParamConfigurator|'zend_lucene'|'elastic'|'test' $value
     * @return $this
     */
    public function adapter($value): static
    {
        $this->_usedProperties['adapter'] = true;
        $this->adapter = $value;

        return $this;
    }

    /**
     * @default {"zend_lucene":{"hide_index_exception":false,"basepath":"%kernel.root_dir%\/data","encoding":"UTF-8"},"elastic":{"version":"2.2","hosts":["localhost:9200"]}}
    */
    public function adapters(array $value = []): \Symfony\Config\MassiveSearch\AdaptersConfig
    {
        if (null === $this->adapters) {
            $this->_usedProperties['adapters'] = true;
            $this->adapters = new \Symfony\Config\MassiveSearch\AdaptersConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "adapters()" has already been initialized. You cannot pass values the second time you call adapters().');
        }

        return $this->adapters;
    }

    /**
     * @default {"prefix":"massive","cache_dir":"%kernel.cache_dir%\/massive-search","debug":"%kernel.debug%"}
    */
    public function metadata(array $value = []): \Symfony\Config\MassiveSearch\MetadataConfig
    {
        if (null === $this->metadata) {
            $this->_usedProperties['metadata'] = true;
            $this->metadata = new \Symfony\Config\MassiveSearch\MetadataConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "metadata()" has already been initialized. You cannot pass values the second time you call metadata().');
        }

        return $this->metadata;
    }

    /**
     * @default {"doctrine_orm":{"enabled":false}}
    */
    public function persistence(array $value = []): \Symfony\Config\MassiveSearch\PersistenceConfig
    {
        if (null === $this->persistence) {
            $this->_usedProperties['persistence'] = true;
            $this->persistence = new \Symfony\Config\MassiveSearch\PersistenceConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "persistence()" has already been initialized. You cannot pass values the second time you call persistence().');
        }

        return $this->persistence;
    }

    public function getExtensionAlias(): string
    {
        return 'massive_search';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('services', $value)) {
            $this->_usedProperties['services'] = true;
            $this->services = new \Symfony\Config\MassiveSearch\ServicesConfig($value['services']);
            unset($value['services']);
        }

        if (array_key_exists('adapter', $value)) {
            $this->_usedProperties['adapter'] = true;
            $this->adapter = $value['adapter'];
            unset($value['adapter']);
        }

        if (array_key_exists('adapters', $value)) {
            $this->_usedProperties['adapters'] = true;
            $this->adapters = new \Symfony\Config\MassiveSearch\AdaptersConfig($value['adapters']);
            unset($value['adapters']);
        }

        if (array_key_exists('metadata', $value)) {
            $this->_usedProperties['metadata'] = true;
            $this->metadata = new \Symfony\Config\MassiveSearch\MetadataConfig($value['metadata']);
            unset($value['metadata']);
        }

        if (array_key_exists('persistence', $value)) {
            $this->_usedProperties['persistence'] = true;
            $this->persistence = new \Symfony\Config\MassiveSearch\PersistenceConfig($value['persistence']);
            unset($value['persistence']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['services'])) {
            $output['services'] = $this->services->toArray();
        }
        if (isset($this->_usedProperties['adapter'])) {
            $output['adapter'] = $this->adapter;
        }
        if (isset($this->_usedProperties['adapters'])) {
            $output['adapters'] = $this->adapters->toArray();
        }
        if (isset($this->_usedProperties['metadata'])) {
            $output['metadata'] = $this->metadata->toArray();
        }
        if (isset($this->_usedProperties['persistence'])) {
            $output['persistence'] = $this->persistence->toArray();
        }

        return $output;
    }

}
