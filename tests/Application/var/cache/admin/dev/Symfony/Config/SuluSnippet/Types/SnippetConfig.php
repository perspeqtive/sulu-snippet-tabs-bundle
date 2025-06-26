<?php

namespace Symfony\Config\SuluSnippet\Types;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SnippetConfig 
{
    private $defaultEnabled;
    private $_usedProperties = [];

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function defaultEnabled($value): static
    {
        $this->_usedProperties['defaultEnabled'] = true;
        $this->defaultEnabled = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('default_enabled', $value)) {
            $this->_usedProperties['defaultEnabled'] = true;
            $this->defaultEnabled = $value['default_enabled'];
            unset($value['default_enabled']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['defaultEnabled'])) {
            $output['default_enabled'] = $this->defaultEnabled;
        }

        return $output;
    }

}
