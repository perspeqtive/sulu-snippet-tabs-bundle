<?php

namespace Symfony\Config\SuluSnippetTabs;

require_once __DIR__.\DIRECTORY_SEPARATOR.'ConfigurationConfig'.\DIRECTORY_SEPARATOR.'TabsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ConfigurationConfig 
{
    private $snippetType;
    private $tabs;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function snippetType($value): static
    {
        $this->_usedProperties['snippetType'] = true;
        $this->snippetType = $value;

        return $this;
    }

    public function tabs(array $value = []): \Symfony\Config\SuluSnippetTabs\ConfigurationConfig\TabsConfig
    {
        $this->_usedProperties['tabs'] = true;

        return $this->tabs[] = new \Symfony\Config\SuluSnippetTabs\ConfigurationConfig\TabsConfig($value);
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('snippet_type', $value)) {
            $this->_usedProperties['snippetType'] = true;
            $this->snippetType = $value['snippet_type'];
            unset($value['snippet_type']);
        }

        if (array_key_exists('tabs', $value)) {
            $this->_usedProperties['tabs'] = true;
            $this->tabs = array_map(fn ($v) => new \Symfony\Config\SuluSnippetTabs\ConfigurationConfig\TabsConfig($v), $value['tabs']);
            unset($value['tabs']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['snippetType'])) {
            $output['snippet_type'] = $this->snippetType;
        }
        if (isset($this->_usedProperties['tabs'])) {
            $output['tabs'] = array_map(fn ($v) => $v->toArray(), $this->tabs);
        }

        return $output;
    }

}
