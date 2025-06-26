<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluCore'.\DIRECTORY_SEPARATOR.'ContentConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluCore'.\DIRECTORY_SEPARATOR.'WebspaceConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluCore'.\DIRECTORY_SEPARATOR.'FieldsDefaultsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluCore'.\DIRECTORY_SEPARATOR.'CacheConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;

/**
 * This class is automatically generated to help in creating a config.
 */
class SuluCoreConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $content;
    private $webspace;
    private $fieldsDefaults;
    private $cacheDir;
    private $cache;
    private $locales;
    private $translations;
    private $fallbackLocale;
    private $_usedProperties = [];

    /**
     * @default {"internal_prefix":"","language":{"namespace":"i18n","default":"%kernel.default_locale%"},"node_names":{"base":"cmf","content":"contents","route":"routes","snippet":"snippets"},"structure":{"default_type":[],"required_properties":[],"required_tags":[],"paths":[],"type_map":[]}}
    */
    public function content(array $value = []): \Symfony\Config\SuluCore\ContentConfig
    {
        if (null === $this->content) {
            $this->_usedProperties['content'] = true;
            $this->content = new \Symfony\Config\SuluCore\ContentConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "content()" has already been initialized. You cannot pass values the second time you call content().');
        }

        return $this->content;
    }

    /**
     * @default {"config_dir":"%kernel.project_dir%\/config\/webspaces"}
    */
    public function webspace(array $value = []): \Symfony\Config\SuluCore\WebspaceConfig
    {
        if (null === $this->webspace) {
            $this->_usedProperties['webspace'] = true;
            $this->webspace = new \Symfony\Config\SuluCore\WebspaceConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "webspace()" has already been initialized. You cannot pass values the second time you call webspace().');
        }

        return $this->webspace;
    }

    /**
     * @default {"translations":{"id":"public.id","title":"public.title","name":"public.name","created":"public.created","changed":"public.changed"},"widths":{"id":"50px"}}
    */
    public function fieldsDefaults(array $value = []): \Symfony\Config\SuluCore\FieldsDefaultsConfig
    {
        if (null === $this->fieldsDefaults) {
            $this->_usedProperties['fieldsDefaults'] = true;
            $this->fieldsDefaults = new \Symfony\Config\SuluCore\FieldsDefaultsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "fieldsDefaults()" has already been initialized. You cannot pass values the second time you call fieldsDefaults().');
        }

        return $this->fieldsDefaults;
    }

    /**
     * @default '%kernel.cache_dir%/sulu'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function cacheDir($value): static
    {
        $this->_usedProperties['cacheDir'] = true;
        $this->cacheDir = $value;

        return $this;
    }

    /**
     * @default {"memoize":{"default_lifetime":1}}
    */
    public function cache(array $value = []): \Symfony\Config\SuluCore\CacheConfig
    {
        if (null === $this->cache) {
            $this->_usedProperties['cache'] = true;
            $this->cache = new \Symfony\Config\SuluCore\CacheConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "cache()" has already been initialized. You cannot pass values the second time you call cache().');
        }

        return $this->cache;
    }

    /**
     * @return $this
     */
    public function locales(string $locale, mixed $value): static
    {
        $this->_usedProperties['locales'] = true;
        $this->locales[$locale] = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function translations(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['translations'] = true;
        $this->translations = $value;

        return $this;
    }

    /**
     * @default 'en'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function fallbackLocale($value): static
    {
        $this->_usedProperties['fallbackLocale'] = true;
        $this->fallbackLocale = $value;

        return $this;
    }

    public function getExtensionAlias(): string
    {
        return 'sulu_core';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('content', $value)) {
            $this->_usedProperties['content'] = true;
            $this->content = new \Symfony\Config\SuluCore\ContentConfig($value['content']);
            unset($value['content']);
        }

        if (array_key_exists('webspace', $value)) {
            $this->_usedProperties['webspace'] = true;
            $this->webspace = new \Symfony\Config\SuluCore\WebspaceConfig($value['webspace']);
            unset($value['webspace']);
        }

        if (array_key_exists('fields_defaults', $value)) {
            $this->_usedProperties['fieldsDefaults'] = true;
            $this->fieldsDefaults = new \Symfony\Config\SuluCore\FieldsDefaultsConfig($value['fields_defaults']);
            unset($value['fields_defaults']);
        }

        if (array_key_exists('cache_dir', $value)) {
            $this->_usedProperties['cacheDir'] = true;
            $this->cacheDir = $value['cache_dir'];
            unset($value['cache_dir']);
        }

        if (array_key_exists('cache', $value)) {
            $this->_usedProperties['cache'] = true;
            $this->cache = new \Symfony\Config\SuluCore\CacheConfig($value['cache']);
            unset($value['cache']);
        }

        if (array_key_exists('locales', $value)) {
            $this->_usedProperties['locales'] = true;
            $this->locales = $value['locales'];
            unset($value['locales']);
        }

        if (array_key_exists('translations', $value)) {
            $this->_usedProperties['translations'] = true;
            $this->translations = $value['translations'];
            unset($value['translations']);
        }

        if (array_key_exists('fallback_locale', $value)) {
            $this->_usedProperties['fallbackLocale'] = true;
            $this->fallbackLocale = $value['fallback_locale'];
            unset($value['fallback_locale']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['content'])) {
            $output['content'] = $this->content->toArray();
        }
        if (isset($this->_usedProperties['webspace'])) {
            $output['webspace'] = $this->webspace->toArray();
        }
        if (isset($this->_usedProperties['fieldsDefaults'])) {
            $output['fields_defaults'] = $this->fieldsDefaults->toArray();
        }
        if (isset($this->_usedProperties['cacheDir'])) {
            $output['cache_dir'] = $this->cacheDir;
        }
        if (isset($this->_usedProperties['cache'])) {
            $output['cache'] = $this->cache->toArray();
        }
        if (isset($this->_usedProperties['locales'])) {
            $output['locales'] = $this->locales;
        }
        if (isset($this->_usedProperties['translations'])) {
            $output['translations'] = $this->translations;
        }
        if (isset($this->_usedProperties['fallbackLocale'])) {
            $output['fallback_locale'] = $this->fallbackLocale;
        }

        return $output;
    }

}
