<?php

namespace Symfony\Config\SuluMedia;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SearchConfig 
{
    private $defaultImageFormat;
    private $enabled;
    private $_usedProperties = [];

    /**
     * @default 'sulu-100x100'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultImageFormat($value): static
    {
        $this->_usedProperties['defaultImageFormat'] = true;
        $this->defaultImageFormat = $value;

        return $this;
    }

    /**
     * Enable integration with SuluMediaBundle
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): static
    {
        $this->_usedProperties['enabled'] = true;
        $this->enabled = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('default_image_format', $value)) {
            $this->_usedProperties['defaultImageFormat'] = true;
            $this->defaultImageFormat = $value['default_image_format'];
            unset($value['default_image_format']);
        }

        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['defaultImageFormat'])) {
            $output['default_image_format'] = $this->defaultImageFormat;
        }
        if (isset($this->_usedProperties['enabled'])) {
            $output['enabled'] = $this->enabled;
        }

        return $output;
    }

}
