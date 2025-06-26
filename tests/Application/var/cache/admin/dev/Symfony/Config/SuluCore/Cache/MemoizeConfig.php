<?php

namespace Symfony\Config\SuluCore\Cache;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class MemoizeConfig 
{
    private $defaultLifetime;
    private $_usedProperties = [];

    /**
     * @default 1
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultLifetime($value): static
    {
        $this->_usedProperties['defaultLifetime'] = true;
        $this->defaultLifetime = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('default_lifetime', $value)) {
            $this->_usedProperties['defaultLifetime'] = true;
            $this->defaultLifetime = $value['default_lifetime'];
            unset($value['default_lifetime']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['defaultLifetime'])) {
            $output['default_lifetime'] = $this->defaultLifetime;
        }

        return $output;
    }

}
