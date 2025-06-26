<?php

namespace Symfony\Config\SuluRoute;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Objects'.\DIRECTORY_SEPARATOR.'RouteConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ObjectsConfig 
{
    private $route;
    private $_usedProperties = [];

    /**
     * @default {"model":"Sulu\\Bundle\\RouteBundle\\Entity\\Route","repository":"Sulu\\Bundle\\RouteBundle\\Entity\\RouteRepository"}
    */
    public function route(array $value = []): \Symfony\Config\SuluRoute\Objects\RouteConfig
    {
        if (null === $this->route) {
            $this->_usedProperties['route'] = true;
            $this->route = new \Symfony\Config\SuluRoute\Objects\RouteConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "route()" has already been initialized. You cannot pass values the second time you call route().');
        }

        return $this->route;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('route', $value)) {
            $this->_usedProperties['route'] = true;
            $this->route = new \Symfony\Config\SuluRoute\Objects\RouteConfig($value['route']);
            unset($value['route']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['route'])) {
            $output['route'] = $this->route->toArray();
        }

        return $output;
    }

}
