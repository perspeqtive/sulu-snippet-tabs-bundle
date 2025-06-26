<?php

namespace Symfony\Config\SuluSearch;

require_once __DIR__.\DIRECTORY_SEPARATOR.'IndexesConfig'.\DIRECTORY_SEPARATOR.'ViewConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class IndexesConfig 
{
    private $name;
    private $icon;
    private $view;
    private $securityContext;
    private $contexts;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function name($value): static
    {
        $this->_usedProperties['name'] = true;
        $this->name = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function icon($value): static
    {
        $this->_usedProperties['icon'] = true;
        $this->icon = $value;

        return $this;
    }

    public function view(array $value = []): \Symfony\Config\SuluSearch\IndexesConfig\ViewConfig
    {
        if (null === $this->view) {
            $this->_usedProperties['view'] = true;
            $this->view = new \Symfony\Config\SuluSearch\IndexesConfig\ViewConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "view()" has already been initialized. You cannot pass values the second time you call view().');
        }

        return $this->view;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function securityContext($value): static
    {
        $this->_usedProperties['securityContext'] = true;
        $this->securityContext = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function contexts(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['contexts'] = true;
        $this->contexts = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('name', $value)) {
            $this->_usedProperties['name'] = true;
            $this->name = $value['name'];
            unset($value['name']);
        }

        if (array_key_exists('icon', $value)) {
            $this->_usedProperties['icon'] = true;
            $this->icon = $value['icon'];
            unset($value['icon']);
        }

        if (array_key_exists('view', $value)) {
            $this->_usedProperties['view'] = true;
            $this->view = new \Symfony\Config\SuluSearch\IndexesConfig\ViewConfig($value['view']);
            unset($value['view']);
        }

        if (array_key_exists('security_context', $value)) {
            $this->_usedProperties['securityContext'] = true;
            $this->securityContext = $value['security_context'];
            unset($value['security_context']);
        }

        if (array_key_exists('contexts', $value)) {
            $this->_usedProperties['contexts'] = true;
            $this->contexts = $value['contexts'];
            unset($value['contexts']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['name'])) {
            $output['name'] = $this->name;
        }
        if (isset($this->_usedProperties['icon'])) {
            $output['icon'] = $this->icon;
        }
        if (isset($this->_usedProperties['view'])) {
            $output['view'] = $this->view->toArray();
        }
        if (isset($this->_usedProperties['securityContext'])) {
            $output['security_context'] = $this->securityContext;
        }
        if (isset($this->_usedProperties['contexts'])) {
            $output['contexts'] = $this->contexts;
        }

        return $output;
    }

}
