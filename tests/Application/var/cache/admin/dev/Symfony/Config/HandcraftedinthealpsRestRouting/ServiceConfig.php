<?php

namespace Symfony\Config\HandcraftedinthealpsRestRouting;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ServiceConfig 
{
    private $annotationReader;
    private $inflector;
    private $_usedProperties = [];

    /**
     * @default 'annotation_reader'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function annotationReader($value): static
    {
        $this->_usedProperties['annotationReader'] = true;
        $this->annotationReader = $value;

        return $this;
    }

    /**
     * @default 'handcraftedinthealps_rest_routing.inflector.doctrine'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function inflector($value): static
    {
        $this->_usedProperties['inflector'] = true;
        $this->inflector = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('annotation_reader', $value)) {
            $this->_usedProperties['annotationReader'] = true;
            $this->annotationReader = $value['annotation_reader'];
            unset($value['annotation_reader']);
        }

        if (array_key_exists('inflector', $value)) {
            $this->_usedProperties['inflector'] = true;
            $this->inflector = $value['inflector'];
            unset($value['inflector']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['annotationReader'])) {
            $output['annotation_reader'] = $this->annotationReader;
        }
        if (isset($this->_usedProperties['inflector'])) {
            $output['inflector'] = $this->inflector;
        }

        return $output;
    }

}
