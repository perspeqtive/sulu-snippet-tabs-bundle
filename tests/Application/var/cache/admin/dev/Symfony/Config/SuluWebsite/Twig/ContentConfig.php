<?php

namespace Symfony\Config\SuluWebsite\Twig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ContentConfig 
{
    private $cacheLifetime;
    private $_usedProperties = [];

    /**
     * @default 1
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function cacheLifetime($value): static
    {
        $this->_usedProperties['cacheLifetime'] = true;
        $this->cacheLifetime = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('cache_lifetime', $value)) {
            $this->_usedProperties['cacheLifetime'] = true;
            $this->cacheLifetime = $value['cache_lifetime'];
            unset($value['cache_lifetime']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['cacheLifetime'])) {
            $output['cache_lifetime'] = $this->cacheLifetime;
        }

        return $output;
    }

}
