<?php

namespace Symfony\Config\JmsSerializer\InstancesConfig\ObjectConstructors;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class DoctrineConfig 
{
    private $enabled;
    private $fallbackStrategy;
    private $_usedProperties = [];

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): static
    {
        $this->_usedProperties['enabled'] = true;
        $this->enabled = $value;

        return $this;
    }

    /**
     * @default 'null'
     * @param ParamConfigurator|'null'|'exception'|'fallback' $value
     * @return $this
     */
    public function fallbackStrategy($value): static
    {
        $this->_usedProperties['fallbackStrategy'] = true;
        $this->fallbackStrategy = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('fallback_strategy', $value)) {
            $this->_usedProperties['fallbackStrategy'] = true;
            $this->fallbackStrategy = $value['fallback_strategy'];
            unset($value['fallback_strategy']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['enabled'])) {
            $output['enabled'] = $this->enabled;
        }
        if (isset($this->_usedProperties['fallbackStrategy'])) {
            $output['fallback_strategy'] = $this->fallbackStrategy;
        }

        return $output;
    }

}
