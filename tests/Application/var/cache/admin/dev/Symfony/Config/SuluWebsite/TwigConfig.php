<?php

namespace Symfony\Config\SuluWebsite;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Twig'.\DIRECTORY_SEPARATOR.'AttributesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Twig'.\DIRECTORY_SEPARATOR.'NavigationConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Twig'.\DIRECTORY_SEPARATOR.'ContentConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Twig'.\DIRECTORY_SEPARATOR.'SitemapConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class TwigConfig 
{
    private $attributes;
    private $navigation;
    private $content;
    private $sitemap;
    private $_usedProperties = [];

    /**
     * @default {"urls":true,"path":true}
    */
    public function attributes(array $value = []): \Symfony\Config\SuluWebsite\Twig\AttributesConfig
    {
        if (null === $this->attributes) {
            $this->_usedProperties['attributes'] = true;
            $this->attributes = new \Symfony\Config\SuluWebsite\Twig\AttributesConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "attributes()" has already been initialized. You cannot pass values the second time you call attributes().');
        }

        return $this->attributes;
    }

    /**
     * @default {"cache_lifetime":1}
    */
    public function navigation(array $value = []): \Symfony\Config\SuluWebsite\Twig\NavigationConfig
    {
        if (null === $this->navigation) {
            $this->_usedProperties['navigation'] = true;
            $this->navigation = new \Symfony\Config\SuluWebsite\Twig\NavigationConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "navigation()" has already been initialized. You cannot pass values the second time you call navigation().');
        }

        return $this->navigation;
    }

    /**
     * @default {"cache_lifetime":1}
    */
    public function content(array $value = []): \Symfony\Config\SuluWebsite\Twig\ContentConfig
    {
        if (null === $this->content) {
            $this->_usedProperties['content'] = true;
            $this->content = new \Symfony\Config\SuluWebsite\Twig\ContentConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "content()" has already been initialized. You cannot pass values the second time you call content().');
        }

        return $this->content;
    }

    /**
     * @default {"cache_lifetime":3600}
    */
    public function sitemap(array $value = []): \Symfony\Config\SuluWebsite\Twig\SitemapConfig
    {
        if (null === $this->sitemap) {
            $this->_usedProperties['sitemap'] = true;
            $this->sitemap = new \Symfony\Config\SuluWebsite\Twig\SitemapConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "sitemap()" has already been initialized. You cannot pass values the second time you call sitemap().');
        }

        return $this->sitemap;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('attributes', $value)) {
            $this->_usedProperties['attributes'] = true;
            $this->attributes = new \Symfony\Config\SuluWebsite\Twig\AttributesConfig($value['attributes']);
            unset($value['attributes']);
        }

        if (array_key_exists('navigation', $value)) {
            $this->_usedProperties['navigation'] = true;
            $this->navigation = new \Symfony\Config\SuluWebsite\Twig\NavigationConfig($value['navigation']);
            unset($value['navigation']);
        }

        if (array_key_exists('content', $value)) {
            $this->_usedProperties['content'] = true;
            $this->content = new \Symfony\Config\SuluWebsite\Twig\ContentConfig($value['content']);
            unset($value['content']);
        }

        if (array_key_exists('sitemap', $value)) {
            $this->_usedProperties['sitemap'] = true;
            $this->sitemap = new \Symfony\Config\SuluWebsite\Twig\SitemapConfig($value['sitemap']);
            unset($value['sitemap']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['attributes'])) {
            $output['attributes'] = $this->attributes->toArray();
        }
        if (isset($this->_usedProperties['navigation'])) {
            $output['navigation'] = $this->navigation->toArray();
        }
        if (isset($this->_usedProperties['content'])) {
            $output['content'] = $this->content->toArray();
        }
        if (isset($this->_usedProperties['sitemap'])) {
            $output['sitemap'] = $this->sitemap->toArray();
        }

        return $output;
    }

}
