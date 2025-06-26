<?php

namespace Symfony\Config\SuluAdmin\FieldTypeOptions\SingleSelectionConfig\Types;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class AutoCompleteConfig 
{
    private $displayProperty;
    private $searchProperties;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function displayProperty($value): static
    {
        $this->_usedProperties['displayProperty'] = true;
        $this->displayProperty = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function searchProperties(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['searchProperties'] = true;
        $this->searchProperties = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('display_property', $value)) {
            $this->_usedProperties['displayProperty'] = true;
            $this->displayProperty = $value['display_property'];
            unset($value['display_property']);
        }

        if (array_key_exists('search_properties', $value)) {
            $this->_usedProperties['searchProperties'] = true;
            $this->searchProperties = $value['search_properties'];
            unset($value['search_properties']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['displayProperty'])) {
            $output['display_property'] = $this->displayProperty;
        }
        if (isset($this->_usedProperties['searchProperties'])) {
            $output['search_properties'] = $this->searchProperties;
        }

        return $output;
    }

}
