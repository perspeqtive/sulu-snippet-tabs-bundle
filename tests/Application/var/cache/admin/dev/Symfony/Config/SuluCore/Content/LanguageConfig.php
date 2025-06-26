<?php

namespace Symfony\Config\SuluCore\Content;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class LanguageConfig 
{
    private $namespace;
    private $default;
    private $_usedProperties = [];

    /**
     * @default 'i18n'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function namespace($value): static
    {
        $this->_usedProperties['namespace'] = true;
        $this->namespace = $value;

        return $this;
    }

    /**
     * @default '%kernel.default_locale%'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function default($value): static
    {
        $this->_usedProperties['default'] = true;
        $this->default = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('namespace', $value)) {
            $this->_usedProperties['namespace'] = true;
            $this->namespace = $value['namespace'];
            unset($value['namespace']);
        }

        if (array_key_exists('default', $value)) {
            $this->_usedProperties['default'] = true;
            $this->default = $value['default'];
            unset($value['default']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['namespace'])) {
            $output['namespace'] = $this->namespace;
        }
        if (isset($this->_usedProperties['default'])) {
            $output['default'] = $this->default;
        }

        return $output;
    }

}
