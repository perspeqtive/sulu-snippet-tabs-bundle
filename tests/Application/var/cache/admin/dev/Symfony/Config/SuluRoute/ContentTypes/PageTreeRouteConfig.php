<?php

namespace Symfony\Config\SuluRoute\ContentTypes;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class PageTreeRouteConfig 
{
    private $pageRouteCascade;
    private $_usedProperties = [];

    /**
     * @default 'request'
     * @param ParamConfigurator|'request'|'task'|'off' $value
     * @return $this
     */
    public function pageRouteCascade($value): static
    {
        $this->_usedProperties['pageRouteCascade'] = true;
        $this->pageRouteCascade = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('page_route_cascade', $value)) {
            $this->_usedProperties['pageRouteCascade'] = true;
            $this->pageRouteCascade = $value['page_route_cascade'];
            unset($value['page_route_cascade']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['pageRouteCascade'])) {
            $output['page_route_cascade'] = $this->pageRouteCascade;
        }

        return $output;
    }

}
