<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluSnippet'.\DIRECTORY_SEPARATOR.'TypesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluSnippet'.\DIRECTORY_SEPARATOR.'TwigConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SuluSnippetConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $types;
    private $twig;
    private $_usedProperties = [];

    /**
     * @default {"snippet":{"default_enabled":true}}
    */
    public function types(array $value = []): \Symfony\Config\SuluSnippet\TypesConfig
    {
        if (null === $this->types) {
            $this->_usedProperties['types'] = true;
            $this->types = new \Symfony\Config\SuluSnippet\TypesConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "types()" has already been initialized. You cannot pass values the second time you call types().');
        }

        return $this->types;
    }

    /**
     * @default {"snippet":{"cache_lifetime":1}}
    */
    public function twig(array $value = []): \Symfony\Config\SuluSnippet\TwigConfig
    {
        if (null === $this->twig) {
            $this->_usedProperties['twig'] = true;
            $this->twig = new \Symfony\Config\SuluSnippet\TwigConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "twig()" has already been initialized. You cannot pass values the second time you call twig().');
        }

        return $this->twig;
    }

    public function getExtensionAlias(): string
    {
        return 'sulu_snippet';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('types', $value)) {
            $this->_usedProperties['types'] = true;
            $this->types = new \Symfony\Config\SuluSnippet\TypesConfig($value['types']);
            unset($value['types']);
        }

        if (array_key_exists('twig', $value)) {
            $this->_usedProperties['twig'] = true;
            $this->twig = new \Symfony\Config\SuluSnippet\TwigConfig($value['twig']);
            unset($value['twig']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['types'])) {
            $output['types'] = $this->types->toArray();
        }
        if (isset($this->_usedProperties['twig'])) {
            $output['twig'] = $this->twig->toArray();
        }

        return $output;
    }

}
