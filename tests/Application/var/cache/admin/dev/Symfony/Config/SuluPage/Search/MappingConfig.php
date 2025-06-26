<?php

namespace Symfony\Config\SuluPage\Search;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class MappingConfig 
{
    private $index;
    private $decorateIndex;
    private $_usedProperties = [];

    /**
     * Name of index to use
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function index($value): static
    {
        $this->_usedProperties['index'] = true;
        $this->index = $value;

        return $this;
    }

    /**
     * Decorate Index name
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function decorateIndex($value): static
    {
        $this->_usedProperties['decorateIndex'] = true;
        $this->decorateIndex = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('index', $value)) {
            $this->_usedProperties['index'] = true;
            $this->index = $value['index'];
            unset($value['index']);
        }

        if (array_key_exists('decorate_index', $value)) {
            $this->_usedProperties['decorateIndex'] = true;
            $this->decorateIndex = $value['decorate_index'];
            unset($value['decorate_index']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['index'])) {
            $output['index'] = $this->index;
        }
        if (isset($this->_usedProperties['decorateIndex'])) {
            $output['decorate_index'] = $this->decorateIndex;
        }

        return $output;
    }

}
