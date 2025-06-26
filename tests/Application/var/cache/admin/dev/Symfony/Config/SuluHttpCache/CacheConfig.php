<?php

namespace Symfony\Config\SuluHttpCache;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class CacheConfig 
{
    private $maxAge;
    private $sharedMaxAge;
    private $_usedProperties = [];

    /**
     * @default 240
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function maxAge($value): static
    {
        $this->_usedProperties['maxAge'] = true;
        $this->maxAge = $value;

        return $this;
    }

    /**
     * @default 240
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function sharedMaxAge($value): static
    {
        $this->_usedProperties['sharedMaxAge'] = true;
        $this->sharedMaxAge = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('max_age', $value)) {
            $this->_usedProperties['maxAge'] = true;
            $this->maxAge = $value['max_age'];
            unset($value['max_age']);
        }

        if (array_key_exists('shared_max_age', $value)) {
            $this->_usedProperties['sharedMaxAge'] = true;
            $this->sharedMaxAge = $value['shared_max_age'];
            unset($value['shared_max_age']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['maxAge'])) {
            $output['max_age'] = $this->maxAge;
        }
        if (isset($this->_usedProperties['sharedMaxAge'])) {
            $output['shared_max_age'] = $this->sharedMaxAge;
        }

        return $output;
    }

}
