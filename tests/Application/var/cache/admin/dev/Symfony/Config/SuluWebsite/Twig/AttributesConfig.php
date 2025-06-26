<?php

namespace Symfony\Config\SuluWebsite\Twig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class AttributesConfig 
{
    private $urls;
    private $path;
    private $_usedProperties = [];

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function urls($value): static
    {
        $this->_usedProperties['urls'] = true;
        $this->urls = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function path($value): static
    {
        $this->_usedProperties['path'] = true;
        $this->path = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('urls', $value)) {
            $this->_usedProperties['urls'] = true;
            $this->urls = $value['urls'];
            unset($value['urls']);
        }

        if (array_key_exists('path', $value)) {
            $this->_usedProperties['path'] = true;
            $this->path = $value['path'];
            unset($value['path']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['urls'])) {
            $output['urls'] = $this->urls;
        }
        if (isset($this->_usedProperties['path'])) {
            $output['path'] = $this->path;
        }

        return $output;
    }

}
