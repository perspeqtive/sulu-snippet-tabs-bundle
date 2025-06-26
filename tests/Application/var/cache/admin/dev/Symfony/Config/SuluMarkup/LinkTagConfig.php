<?php

namespace Symfony\Config\SuluMarkup;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class LinkTagConfig 
{
    private $providerAttribute;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function providerAttribute($value): static
    {
        $this->_usedProperties['providerAttribute'] = true;
        $this->providerAttribute = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('provider_attribute', $value)) {
            $this->_usedProperties['providerAttribute'] = true;
            $this->providerAttribute = $value['provider_attribute'];
            unset($value['provider_attribute']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['providerAttribute'])) {
            $output['provider_attribute'] = $this->providerAttribute;
        }

        return $output;
    }

}
