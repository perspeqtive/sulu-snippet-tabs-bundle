<?php

namespace Symfony\Config\SuluRoute;

require_once __DIR__.\DIRECTORY_SEPARATOR.'ContentTypes'.\DIRECTORY_SEPARATOR.'PageTreeRouteConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ContentTypesConfig 
{
    private $pageTreeRoute;
    private $_usedProperties = [];

    /**
     * @default {"page_route_cascade":"request"}
    */
    public function pageTreeRoute(array $value = []): \Symfony\Config\SuluRoute\ContentTypes\PageTreeRouteConfig
    {
        if (null === $this->pageTreeRoute) {
            $this->_usedProperties['pageTreeRoute'] = true;
            $this->pageTreeRoute = new \Symfony\Config\SuluRoute\ContentTypes\PageTreeRouteConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "pageTreeRoute()" has already been initialized. You cannot pass values the second time you call pageTreeRoute().');
        }

        return $this->pageTreeRoute;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('page_tree_route', $value)) {
            $this->_usedProperties['pageTreeRoute'] = true;
            $this->pageTreeRoute = new \Symfony\Config\SuluRoute\ContentTypes\PageTreeRouteConfig($value['page_tree_route']);
            unset($value['page_tree_route']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['pageTreeRoute'])) {
            $output['page_tree_route'] = $this->pageTreeRoute->toArray();
        }

        return $output;
    }

}
