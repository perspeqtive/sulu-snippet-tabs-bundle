<?php

namespace Symfony\Config\MassiveSearch;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Adapters'.\DIRECTORY_SEPARATOR.'ZendLuceneConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Adapters'.\DIRECTORY_SEPARATOR.'ElasticConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class AdaptersConfig 
{
    private $zendLucene;
    private $elastic;
    private $_usedProperties = [];

    /**
     * @default {"hide_index_exception":false,"basepath":"%kernel.root_dir%\/data","encoding":"UTF-8"}
    */
    public function zendLucene(array $value = []): \Symfony\Config\MassiveSearch\Adapters\ZendLuceneConfig
    {
        if (null === $this->zendLucene) {
            $this->_usedProperties['zendLucene'] = true;
            $this->zendLucene = new \Symfony\Config\MassiveSearch\Adapters\ZendLuceneConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "zendLucene()" has already been initialized. You cannot pass values the second time you call zendLucene().');
        }

        return $this->zendLucene;
    }

    /**
     * @default {"version":"2.2","hosts":["localhost:9200"]}
    */
    public function elastic(array $value = []): \Symfony\Config\MassiveSearch\Adapters\ElasticConfig
    {
        if (null === $this->elastic) {
            $this->_usedProperties['elastic'] = true;
            $this->elastic = new \Symfony\Config\MassiveSearch\Adapters\ElasticConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "elastic()" has already been initialized. You cannot pass values the second time you call elastic().');
        }

        return $this->elastic;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('zend_lucene', $value)) {
            $this->_usedProperties['zendLucene'] = true;
            $this->zendLucene = new \Symfony\Config\MassiveSearch\Adapters\ZendLuceneConfig($value['zend_lucene']);
            unset($value['zend_lucene']);
        }

        if (array_key_exists('elastic', $value)) {
            $this->_usedProperties['elastic'] = true;
            $this->elastic = new \Symfony\Config\MassiveSearch\Adapters\ElasticConfig($value['elastic']);
            unset($value['elastic']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['zendLucene'])) {
            $output['zend_lucene'] = $this->zendLucene->toArray();
        }
        if (isset($this->_usedProperties['elastic'])) {
            $output['elastic'] = $this->elastic->toArray();
        }

        return $output;
    }

}
