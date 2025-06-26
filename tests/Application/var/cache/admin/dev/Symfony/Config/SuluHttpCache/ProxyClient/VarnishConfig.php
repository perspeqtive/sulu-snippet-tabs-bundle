<?php

namespace Symfony\Config\SuluHttpCache\ProxyClient;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class VarnishConfig 
{
    private $enabled;
    private $servers;
    private $baseUrl;
    private $tagMode;
    private $tagsHeader;
    private $_usedProperties = [];

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): static
    {
        $this->_usedProperties['enabled'] = true;
        $this->enabled = $value;

        return $this;
    }

    /**
     * @return $this
     */
    public function server(string $name, mixed $value): static
    {
        $this->_usedProperties['servers'] = true;
        $this->servers[$name] = $value;

        return $this;
    }

    /**
     * Default host name and optional path for path based invalidation.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function baseUrl($value): static
    {
        $this->_usedProperties['baseUrl'] = true;
        $this->baseUrl = $value;

        return $this;
    }

    /**
     * Use the purgekeys mode for more efficient tag handling, if your Varnish server supports the xkey module
     * @default 'ban'
     * @param ParamConfigurator|'ban'|'purgekeys' $value
     * @return $this
     */
    public function tagMode($value): static
    {
        $this->_usedProperties['tagMode'] = true;
        $this->tagMode = $value;

        return $this;
    }

    /**
     * HTTP header to use when sending tag invalidation requests to Varnish
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function tagsHeader($value): static
    {
        $this->_usedProperties['tagsHeader'] = true;
        $this->tagsHeader = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('servers', $value)) {
            $this->_usedProperties['servers'] = true;
            $this->servers = $value['servers'];
            unset($value['servers']);
        }

        if (array_key_exists('base_url', $value)) {
            $this->_usedProperties['baseUrl'] = true;
            $this->baseUrl = $value['base_url'];
            unset($value['base_url']);
        }

        if (array_key_exists('tag_mode', $value)) {
            $this->_usedProperties['tagMode'] = true;
            $this->tagMode = $value['tag_mode'];
            unset($value['tag_mode']);
        }

        if (array_key_exists('tags_header', $value)) {
            $this->_usedProperties['tagsHeader'] = true;
            $this->tagsHeader = $value['tags_header'];
            unset($value['tags_header']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['enabled'])) {
            $output['enabled'] = $this->enabled;
        }
        if (isset($this->_usedProperties['servers'])) {
            $output['servers'] = $this->servers;
        }
        if (isset($this->_usedProperties['baseUrl'])) {
            $output['base_url'] = $this->baseUrl;
        }
        if (isset($this->_usedProperties['tagMode'])) {
            $output['tag_mode'] = $this->tagMode;
        }
        if (isset($this->_usedProperties['tagsHeader'])) {
            $output['tags_header'] = $this->tagsHeader;
        }

        return $output;
    }

}
