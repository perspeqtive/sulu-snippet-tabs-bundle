<?php

namespace Symfony\Config\DoctrinePhpcr;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Odm'.\DIRECTORY_SEPARATOR.'NamespacesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Odm'.\DIRECTORY_SEPARATOR.'DocumentManagerConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class OdmConfig 
{
    private $defaultDocumentManager;
    private $autoGenerateProxyClasses;
    private $proxyDir;
    private $proxyNamespace;
    private $localeChooser;
    private $localeFallback;
    private $defaultLocale;
    private $namespaces;
    private $documentManagers;
    private $locales;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultDocumentManager($value): static
    {
        $this->_usedProperties['defaultDocumentManager'] = true;
        $this->defaultDocumentManager = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function autoGenerateProxyClasses($value): static
    {
        $this->_usedProperties['autoGenerateProxyClasses'] = true;
        $this->autoGenerateProxyClasses = $value;

        return $this;
    }

    /**
     * @default '%kernel.cache_dir%/doctrine/PHPCRProxies'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function proxyDir($value): static
    {
        $this->_usedProperties['proxyDir'] = true;
        $this->proxyDir = $value;

        return $this;
    }

    /**
     * @default 'PHPCRProxies'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function proxyNamespace($value): static
    {
        $this->_usedProperties['proxyNamespace'] = true;
        $this->proxyNamespace = $value;

        return $this;
    }

    /**
     * Specify custom locale chooser service ID
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function localeChooser($value): static
    {
        $this->_usedProperties['localeChooser'] = true;
        $this->localeChooser = $value;

        return $this;
    }

    /**
     * @default 'merge'
     * @param ParamConfigurator|'hardcoded'|'merge'|'replace' $value
     * @return $this
     */
    public function localeFallback($value): static
    {
        $this->_usedProperties['localeFallback'] = true;
        $this->localeFallback = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultLocale($value): static
    {
        $this->_usedProperties['defaultLocale'] = true;
        $this->defaultLocale = $value;

        return $this;
    }

    /**
     * @default {"translation":{"alias":null}}
    */
    public function namespaces(array $value = []): \Symfony\Config\DoctrinePhpcr\Odm\NamespacesConfig
    {
        if (null === $this->namespaces) {
            $this->_usedProperties['namespaces'] = true;
            $this->namespaces = new \Symfony\Config\DoctrinePhpcr\Odm\NamespacesConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "namespaces()" has already been initialized. You cannot pass values the second time you call namespaces().');
        }

        return $this->namespaces;
    }

    public function documentManager(string $name, array $value = []): \Symfony\Config\DoctrinePhpcr\Odm\DocumentManagerConfig
    {
        if (!isset($this->documentManagers[$name])) {
            $this->_usedProperties['documentManagers'] = true;
            $this->documentManagers[$name] = new \Symfony\Config\DoctrinePhpcr\Odm\DocumentManagerConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "documentManager()" has already been initialized. You cannot pass values the second time you call documentManager().');
        }

        return $this->documentManagers[$name];
    }

    /**
     * @return $this
     */
    public function locale(string $name, mixed $value): static
    {
        $this->_usedProperties['locales'] = true;
        $this->locales[$name] = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('default_document_manager', $value)) {
            $this->_usedProperties['defaultDocumentManager'] = true;
            $this->defaultDocumentManager = $value['default_document_manager'];
            unset($value['default_document_manager']);
        }

        if (array_key_exists('auto_generate_proxy_classes', $value)) {
            $this->_usedProperties['autoGenerateProxyClasses'] = true;
            $this->autoGenerateProxyClasses = $value['auto_generate_proxy_classes'];
            unset($value['auto_generate_proxy_classes']);
        }

        if (array_key_exists('proxy_dir', $value)) {
            $this->_usedProperties['proxyDir'] = true;
            $this->proxyDir = $value['proxy_dir'];
            unset($value['proxy_dir']);
        }

        if (array_key_exists('proxy_namespace', $value)) {
            $this->_usedProperties['proxyNamespace'] = true;
            $this->proxyNamespace = $value['proxy_namespace'];
            unset($value['proxy_namespace']);
        }

        if (array_key_exists('locale_chooser', $value)) {
            $this->_usedProperties['localeChooser'] = true;
            $this->localeChooser = $value['locale_chooser'];
            unset($value['locale_chooser']);
        }

        if (array_key_exists('locale_fallback', $value)) {
            $this->_usedProperties['localeFallback'] = true;
            $this->localeFallback = $value['locale_fallback'];
            unset($value['locale_fallback']);
        }

        if (array_key_exists('default_locale', $value)) {
            $this->_usedProperties['defaultLocale'] = true;
            $this->defaultLocale = $value['default_locale'];
            unset($value['default_locale']);
        }

        if (array_key_exists('namespaces', $value)) {
            $this->_usedProperties['namespaces'] = true;
            $this->namespaces = new \Symfony\Config\DoctrinePhpcr\Odm\NamespacesConfig($value['namespaces']);
            unset($value['namespaces']);
        }

        if (array_key_exists('document_managers', $value)) {
            $this->_usedProperties['documentManagers'] = true;
            $this->documentManagers = array_map(fn ($v) => new \Symfony\Config\DoctrinePhpcr\Odm\DocumentManagerConfig($v), $value['document_managers']);
            unset($value['document_managers']);
        }

        if (array_key_exists('locales', $value)) {
            $this->_usedProperties['locales'] = true;
            $this->locales = $value['locales'];
            unset($value['locales']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['defaultDocumentManager'])) {
            $output['default_document_manager'] = $this->defaultDocumentManager;
        }
        if (isset($this->_usedProperties['autoGenerateProxyClasses'])) {
            $output['auto_generate_proxy_classes'] = $this->autoGenerateProxyClasses;
        }
        if (isset($this->_usedProperties['proxyDir'])) {
            $output['proxy_dir'] = $this->proxyDir;
        }
        if (isset($this->_usedProperties['proxyNamespace'])) {
            $output['proxy_namespace'] = $this->proxyNamespace;
        }
        if (isset($this->_usedProperties['localeChooser'])) {
            $output['locale_chooser'] = $this->localeChooser;
        }
        if (isset($this->_usedProperties['localeFallback'])) {
            $output['locale_fallback'] = $this->localeFallback;
        }
        if (isset($this->_usedProperties['defaultLocale'])) {
            $output['default_locale'] = $this->defaultLocale;
        }
        if (isset($this->_usedProperties['namespaces'])) {
            $output['namespaces'] = $this->namespaces->toArray();
        }
        if (isset($this->_usedProperties['documentManagers'])) {
            $output['document_managers'] = array_map(fn ($v) => $v->toArray(), $this->documentManagers);
        }
        if (isset($this->_usedProperties['locales'])) {
            $output['locales'] = $this->locales;
        }

        return $output;
    }

}
