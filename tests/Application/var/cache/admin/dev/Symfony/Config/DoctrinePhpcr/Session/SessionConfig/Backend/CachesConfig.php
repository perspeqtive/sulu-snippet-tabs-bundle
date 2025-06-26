<?php

namespace Symfony\Config\DoctrinePhpcr\Session\SessionConfig\Backend;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class CachesConfig 
{
    private $meta;
    private $nodes;
    private $query;
    private $_usedProperties = [];

    /**
     * For jackalope 2.x, this must be a PSR-16 simple cache instance. Jackalope 1.x also accepts a Doctrine Cache
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function meta($value): static
    {
        $this->_usedProperties['meta'] = true;
        $this->meta = $value;

        return $this;
    }

    /**
     * For jackalope 2.x, this must be a PSR-16 simple cache instance. Jackalope 1.x also accepts a Doctrine Cache
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function nodes($value): static
    {
        $this->_usedProperties['nodes'] = true;
        $this->nodes = $value;

        return $this;
    }

    /**
     * For jackalope 2.x, this must be a PSR-16 simple cache instance. Jackalope 1.x also accepts a Doctrine Cache
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function query($value): static
    {
        $this->_usedProperties['query'] = true;
        $this->query = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('meta', $value)) {
            $this->_usedProperties['meta'] = true;
            $this->meta = $value['meta'];
            unset($value['meta']);
        }

        if (array_key_exists('nodes', $value)) {
            $this->_usedProperties['nodes'] = true;
            $this->nodes = $value['nodes'];
            unset($value['nodes']);
        }

        if (array_key_exists('query', $value)) {
            $this->_usedProperties['query'] = true;
            $this->query = $value['query'];
            unset($value['query']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['meta'])) {
            $output['meta'] = $this->meta;
        }
        if (isset($this->_usedProperties['nodes'])) {
            $output['nodes'] = $this->nodes;
        }
        if (isset($this->_usedProperties['query'])) {
            $output['query'] = $this->query;
        }

        return $output;
    }

}
