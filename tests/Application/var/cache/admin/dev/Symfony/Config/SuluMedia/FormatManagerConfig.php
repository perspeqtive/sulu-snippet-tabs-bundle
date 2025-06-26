<?php

namespace Symfony\Config\SuluMedia;

require_once __DIR__.\DIRECTORY_SEPARATOR.'FormatManager'.\DIRECTORY_SEPARATOR.'TypesConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FormatManagerConfig 
{
    private $responseHeaders;
    private $defaultImagineOptions;
    private $blockedFileTypes;
    private $mimeTypes;
    private $types;
    private $_usedProperties = [];

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function responseHeaders(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['responseHeaders'] = true;
        $this->responseHeaders = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function defaultImagineOptions(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['defaultImagineOptions'] = true;
        $this->defaultImagineOptions = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function blockedFileTypes(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['blockedFileTypes'] = true;
        $this->blockedFileTypes = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function mimeTypes(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['mimeTypes'] = true;
        $this->mimeTypes = $value;

        return $this;
    }

    /**
     * @default [{"type":"document","mimeTypes":["*"]},{"type":"image","mimeTypes":["image\/*"]},{"type":"video","mimeTypes":["video\/*"]},{"type":"audio","mimeTypes":["audio\/*"]}]
    */
    public function types(array $value = []): \Symfony\Config\SuluMedia\FormatManager\TypesConfig
    {
        $this->_usedProperties['types'] = true;

        return $this->types[] = new \Symfony\Config\SuluMedia\FormatManager\TypesConfig($value);
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('response_headers', $value)) {
            $this->_usedProperties['responseHeaders'] = true;
            $this->responseHeaders = $value['response_headers'];
            unset($value['response_headers']);
        }

        if (array_key_exists('default_imagine_options', $value)) {
            $this->_usedProperties['defaultImagineOptions'] = true;
            $this->defaultImagineOptions = $value['default_imagine_options'];
            unset($value['default_imagine_options']);
        }

        if (array_key_exists('blocked_file_types', $value)) {
            $this->_usedProperties['blockedFileTypes'] = true;
            $this->blockedFileTypes = $value['blocked_file_types'];
            unset($value['blocked_file_types']);
        }

        if (array_key_exists('mime_types', $value)) {
            $this->_usedProperties['mimeTypes'] = true;
            $this->mimeTypes = $value['mime_types'];
            unset($value['mime_types']);
        }

        if (array_key_exists('types', $value)) {
            $this->_usedProperties['types'] = true;
            $this->types = array_map(fn ($v) => new \Symfony\Config\SuluMedia\FormatManager\TypesConfig($v), $value['types']);
            unset($value['types']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['responseHeaders'])) {
            $output['response_headers'] = $this->responseHeaders;
        }
        if (isset($this->_usedProperties['defaultImagineOptions'])) {
            $output['default_imagine_options'] = $this->defaultImagineOptions;
        }
        if (isset($this->_usedProperties['blockedFileTypes'])) {
            $output['blocked_file_types'] = $this->blockedFileTypes;
        }
        if (isset($this->_usedProperties['mimeTypes'])) {
            $output['mime_types'] = $this->mimeTypes;
        }
        if (isset($this->_usedProperties['types'])) {
            $output['types'] = array_map(fn ($v) => $v->toArray(), $this->types);
        }

        return $output;
    }

}
