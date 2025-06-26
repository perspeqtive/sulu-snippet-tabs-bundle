<?php

namespace Symfony\Config\MassiveSearch;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ServicesConfig 
{
    private $factory;
    private $_usedProperties = [];

    /**
     * @default 'massive_search.factory_default'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function factory($value): static
    {
        $this->_usedProperties['factory'] = true;
        $this->factory = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('factory', $value)) {
            $this->_usedProperties['factory'] = true;
            $this->factory = $value['factory'];
            unset($value['factory']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['factory'])) {
            $output['factory'] = $this->factory;
        }

        return $output;
    }

}
