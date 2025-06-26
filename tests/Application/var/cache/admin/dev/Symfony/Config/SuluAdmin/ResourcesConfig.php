<?php

namespace Symfony\Config\SuluAdmin;

require_once __DIR__.\DIRECTORY_SEPARATOR.'ResourcesConfig'.\DIRECTORY_SEPARATOR.'RoutesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ResourcesConfig'.\DIRECTORY_SEPARATOR.'ViewsConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;

/**
 * This class is automatically generated to help in creating a config.
 */
class ResourcesConfig 
{
    private $routes;
    private $views;
    private $securityContext;
    private $securityClass;
    private $_usedProperties = [];

    public function routes(array $value = []): \Symfony\Config\SuluAdmin\ResourcesConfig\RoutesConfig
    {
        if (null === $this->routes) {
            $this->_usedProperties['routes'] = true;
            $this->routes = new \Symfony\Config\SuluAdmin\ResourcesConfig\RoutesConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "routes()" has already been initialized. You cannot pass values the second time you call routes().');
        }

        return $this->routes;
    }

    public function views(array $value = []): \Symfony\Config\SuluAdmin\ResourcesConfig\ViewsConfig
    {
        if (null === $this->views) {
            $this->_usedProperties['views'] = true;
            $this->views = new \Symfony\Config\SuluAdmin\ResourcesConfig\ViewsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "views()" has already been initialized. You cannot pass values the second time you call views().');
        }

        return $this->views;
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
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function securityClass($value): static
    {
        $this->_usedProperties['securityClass'] = true;
        $this->securityClass = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('routes', $value)) {
            $this->_usedProperties['routes'] = true;
            $this->routes = new \Symfony\Config\SuluAdmin\ResourcesConfig\RoutesConfig($value['routes']);
            unset($value['routes']);
        }

        if (array_key_exists('views', $value)) {
            $this->_usedProperties['views'] = true;
            $this->views = new \Symfony\Config\SuluAdmin\ResourcesConfig\ViewsConfig($value['views']);
            unset($value['views']);
        }

        if (array_key_exists('security_context', $value)) {
            $this->_usedProperties['securityContext'] = true;
            $this->securityContext = $value['security_context'];
            unset($value['security_context']);
        }

        if (array_key_exists('security_class', $value)) {
            $this->_usedProperties['securityClass'] = true;
            $this->securityClass = $value['security_class'];
            unset($value['security_class']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['routes'])) {
            $output['routes'] = $this->routes->toArray();
        }
        if (isset($this->_usedProperties['views'])) {
            $output['views'] = $this->views->toArray();
        }
        if (isset($this->_usedProperties['securityContext'])) {
            $output['security_context'] = $this->securityContext;
        }
        if (isset($this->_usedProperties['securityClass'])) {
            $output['security_class'] = $this->securityClass;
        }

        return $output;
    }

}
