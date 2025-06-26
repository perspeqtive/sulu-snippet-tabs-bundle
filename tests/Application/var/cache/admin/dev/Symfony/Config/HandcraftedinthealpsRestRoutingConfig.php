<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'HandcraftedinthealpsRestRouting'.\DIRECTORY_SEPARATOR.'RoutingLoaderConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'HandcraftedinthealpsRestRouting'.\DIRECTORY_SEPARATOR.'ServiceConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class HandcraftedinthealpsRestRoutingConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $routingLoader;
    private $service;
    private $_usedProperties = [];

    /**
     * @default {"default_format":null,"prefix_methods":true,"include_format":true,"formats":[]}
    */
    public function routingLoader(array $value = []): \Symfony\Config\HandcraftedinthealpsRestRouting\RoutingLoaderConfig
    {
        if (null === $this->routingLoader) {
            $this->_usedProperties['routingLoader'] = true;
            $this->routingLoader = new \Symfony\Config\HandcraftedinthealpsRestRouting\RoutingLoaderConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "routingLoader()" has already been initialized. You cannot pass values the second time you call routingLoader().');
        }

        return $this->routingLoader;
    }

    /**
     * @default {"annotation_reader":"annotation_reader","inflector":"handcraftedinthealps_rest_routing.inflector.doctrine"}
    */
    public function service(array $value = []): \Symfony\Config\HandcraftedinthealpsRestRouting\ServiceConfig
    {
        if (null === $this->service) {
            $this->_usedProperties['service'] = true;
            $this->service = new \Symfony\Config\HandcraftedinthealpsRestRouting\ServiceConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "service()" has already been initialized. You cannot pass values the second time you call service().');
        }

        return $this->service;
    }

    public function getExtensionAlias(): string
    {
        return 'handcraftedinthealps_rest_routing';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('routing_loader', $value)) {
            $this->_usedProperties['routingLoader'] = true;
            $this->routingLoader = new \Symfony\Config\HandcraftedinthealpsRestRouting\RoutingLoaderConfig($value['routing_loader']);
            unset($value['routing_loader']);
        }

        if (array_key_exists('service', $value)) {
            $this->_usedProperties['service'] = true;
            $this->service = new \Symfony\Config\HandcraftedinthealpsRestRouting\ServiceConfig($value['service']);
            unset($value['service']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['routingLoader'])) {
            $output['routing_loader'] = $this->routingLoader->toArray();
        }
        if (isset($this->_usedProperties['service'])) {
            $output['service'] = $this->service->toArray();
        }

        return $output;
    }

}
