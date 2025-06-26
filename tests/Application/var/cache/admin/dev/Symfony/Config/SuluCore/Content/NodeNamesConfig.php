<?php

namespace Symfony\Config\SuluCore\Content;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class NodeNamesConfig 
{
    private $base;
    private $content;
    private $route;
    private $snippet;
    private $_usedProperties = [];

    /**
     * @default 'cmf'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function base($value): static
    {
        $this->_usedProperties['base'] = true;
        $this->base = $value;

        return $this;
    }

    /**
     * @default 'contents'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function content($value): static
    {
        $this->_usedProperties['content'] = true;
        $this->content = $value;

        return $this;
    }

    /**
     * @default 'routes'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function route($value): static
    {
        $this->_usedProperties['route'] = true;
        $this->route = $value;

        return $this;
    }

    /**
     * @default 'snippets'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function snippet($value): static
    {
        $this->_usedProperties['snippet'] = true;
        $this->snippet = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('base', $value)) {
            $this->_usedProperties['base'] = true;
            $this->base = $value['base'];
            unset($value['base']);
        }

        if (array_key_exists('content', $value)) {
            $this->_usedProperties['content'] = true;
            $this->content = $value['content'];
            unset($value['content']);
        }

        if (array_key_exists('route', $value)) {
            $this->_usedProperties['route'] = true;
            $this->route = $value['route'];
            unset($value['route']);
        }

        if (array_key_exists('snippet', $value)) {
            $this->_usedProperties['snippet'] = true;
            $this->snippet = $value['snippet'];
            unset($value['snippet']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['base'])) {
            $output['base'] = $this->base;
        }
        if (isset($this->_usedProperties['content'])) {
            $output['content'] = $this->content;
        }
        if (isset($this->_usedProperties['route'])) {
            $output['route'] = $this->route;
        }
        if (isset($this->_usedProperties['snippet'])) {
            $output['snippet'] = $this->snippet;
        }

        return $output;
    }

}
