<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluWebsite'.\DIRECTORY_SEPARATOR.'AnalyticsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluWebsite'.\DIRECTORY_SEPARATOR.'SegmentsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluWebsite'.\DIRECTORY_SEPARATOR.'TwigConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluWebsite'.\DIRECTORY_SEPARATOR.'SitemapConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluWebsite'.\DIRECTORY_SEPARATOR.'DefaultLocaleConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluWebsite'.\DIRECTORY_SEPARATOR.'ObjectsConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SuluWebsiteConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $analytics;
    private $segments;
    private $twig;
    private $sitemap;
    private $defaultLocale;
    private $objects;
    private $_usedProperties = [];

    /**
     * @default {"enabled":true}
    */
    public function analytics(array $value = []): \Symfony\Config\SuluWebsite\AnalyticsConfig
    {
        if (null === $this->analytics) {
            $this->_usedProperties['analytics'] = true;
            $this->analytics = new \Symfony\Config\SuluWebsite\AnalyticsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "analytics()" has already been initialized. You cannot pass values the second time you call analytics().');
        }

        return $this->analytics;
    }

    /**
     * @default {"switch_url":"\/_sulu_segment_switch","cookie":"_ss","header":"X-Sulu-Segment"}
    */
    public function segments(array $value = []): \Symfony\Config\SuluWebsite\SegmentsConfig
    {
        if (null === $this->segments) {
            $this->_usedProperties['segments'] = true;
            $this->segments = new \Symfony\Config\SuluWebsite\SegmentsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "segments()" has already been initialized. You cannot pass values the second time you call segments().');
        }

        return $this->segments;
    }

    /**
     * @default {"attributes":{"urls":true,"path":true},"navigation":{"cache_lifetime":1},"content":{"cache_lifetime":1},"sitemap":{"cache_lifetime":3600}}
    */
    public function twig(array $value = []): \Symfony\Config\SuluWebsite\TwigConfig
    {
        if (null === $this->twig) {
            $this->_usedProperties['twig'] = true;
            $this->twig = new \Symfony\Config\SuluWebsite\TwigConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "twig()" has already been initialized. You cannot pass values the second time you call twig().');
        }

        return $this->twig;
    }

    /**
     * @default {"dump_dir":"%sulu.cache_dir%\/sitemaps"}
    */
    public function sitemap(array $value = []): \Symfony\Config\SuluWebsite\SitemapConfig
    {
        if (null === $this->sitemap) {
            $this->_usedProperties['sitemap'] = true;
            $this->sitemap = new \Symfony\Config\SuluWebsite\SitemapConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "sitemap()" has already been initialized. You cannot pass values the second time you call sitemap().');
        }

        return $this->sitemap;
    }

    /**
     * @default {"provider_service_id":"sulu_website.default_locale.portal_provider"}
    */
    public function defaultLocale(array $value = []): \Symfony\Config\SuluWebsite\DefaultLocaleConfig
    {
        if (null === $this->defaultLocale) {
            $this->_usedProperties['defaultLocale'] = true;
            $this->defaultLocale = new \Symfony\Config\SuluWebsite\DefaultLocaleConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "defaultLocale()" has already been initialized. You cannot pass values the second time you call defaultLocale().');
        }

        return $this->defaultLocale;
    }

    /**
     * @default {"analytics":{"model":"Sulu\\Bundle\\WebsiteBundle\\Entity\\Analytics","repository":"Sulu\\Bundle\\WebsiteBundle\\Entity\\AnalyticsRepository"}}
    */
    public function objects(array $value = []): \Symfony\Config\SuluWebsite\ObjectsConfig
    {
        if (null === $this->objects) {
            $this->_usedProperties['objects'] = true;
            $this->objects = new \Symfony\Config\SuluWebsite\ObjectsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "objects()" has already been initialized. You cannot pass values the second time you call objects().');
        }

        return $this->objects;
    }

    public function getExtensionAlias(): string
    {
        return 'sulu_website';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('analytics', $value)) {
            $this->_usedProperties['analytics'] = true;
            $this->analytics = new \Symfony\Config\SuluWebsite\AnalyticsConfig($value['analytics']);
            unset($value['analytics']);
        }

        if (array_key_exists('segments', $value)) {
            $this->_usedProperties['segments'] = true;
            $this->segments = new \Symfony\Config\SuluWebsite\SegmentsConfig($value['segments']);
            unset($value['segments']);
        }

        if (array_key_exists('twig', $value)) {
            $this->_usedProperties['twig'] = true;
            $this->twig = new \Symfony\Config\SuluWebsite\TwigConfig($value['twig']);
            unset($value['twig']);
        }

        if (array_key_exists('sitemap', $value)) {
            $this->_usedProperties['sitemap'] = true;
            $this->sitemap = new \Symfony\Config\SuluWebsite\SitemapConfig($value['sitemap']);
            unset($value['sitemap']);
        }

        if (array_key_exists('default_locale', $value)) {
            $this->_usedProperties['defaultLocale'] = true;
            $this->defaultLocale = new \Symfony\Config\SuluWebsite\DefaultLocaleConfig($value['default_locale']);
            unset($value['default_locale']);
        }

        if (array_key_exists('objects', $value)) {
            $this->_usedProperties['objects'] = true;
            $this->objects = new \Symfony\Config\SuluWebsite\ObjectsConfig($value['objects']);
            unset($value['objects']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['analytics'])) {
            $output['analytics'] = $this->analytics->toArray();
        }
        if (isset($this->_usedProperties['segments'])) {
            $output['segments'] = $this->segments->toArray();
        }
        if (isset($this->_usedProperties['twig'])) {
            $output['twig'] = $this->twig->toArray();
        }
        if (isset($this->_usedProperties['sitemap'])) {
            $output['sitemap'] = $this->sitemap->toArray();
        }
        if (isset($this->_usedProperties['defaultLocale'])) {
            $output['default_locale'] = $this->defaultLocale->toArray();
        }
        if (isset($this->_usedProperties['objects'])) {
            $output['objects'] = $this->objects->toArray();
        }

        return $output;
    }

}
