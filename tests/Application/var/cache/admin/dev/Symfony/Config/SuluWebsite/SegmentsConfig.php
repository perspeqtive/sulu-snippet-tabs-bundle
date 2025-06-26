<?php

namespace Symfony\Config\SuluWebsite;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SegmentsConfig 
{
    private $switchUrl;
    private $cookie;
    private $header;
    private $_usedProperties = [];

    /**
     * @default '/_sulu_segment_switch'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function switchUrl($value): static
    {
        $this->_usedProperties['switchUrl'] = true;
        $this->switchUrl = $value;

        return $this;
    }

    /**
     * @default '_ss'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function cookie($value): static
    {
        $this->_usedProperties['cookie'] = true;
        $this->cookie = $value;

        return $this;
    }

    /**
     * @default 'X-Sulu-Segment'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function header($value): static
    {
        $this->_usedProperties['header'] = true;
        $this->header = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('switch_url', $value)) {
            $this->_usedProperties['switchUrl'] = true;
            $this->switchUrl = $value['switch_url'];
            unset($value['switch_url']);
        }

        if (array_key_exists('cookie', $value)) {
            $this->_usedProperties['cookie'] = true;
            $this->cookie = $value['cookie'];
            unset($value['cookie']);
        }

        if (array_key_exists('header', $value)) {
            $this->_usedProperties['header'] = true;
            $this->header = $value['header'];
            unset($value['header']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['switchUrl'])) {
            $output['switch_url'] = $this->switchUrl;
        }
        if (isset($this->_usedProperties['cookie'])) {
            $output['cookie'] = $this->cookie;
        }
        if (isset($this->_usedProperties['header'])) {
            $output['header'] = $this->header;
        }

        return $output;
    }

}
