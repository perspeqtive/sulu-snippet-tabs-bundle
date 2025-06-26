<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluSnippetTabs'.\DIRECTORY_SEPARATOR.'ConfigurationConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SuluSnippetTabsConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $configuration;
    private $_usedProperties = [];

    public function configuration(string $name, array $value = []): \Symfony\Config\SuluSnippetTabs\ConfigurationConfig
    {
        if (!isset($this->configuration[$name])) {
            $this->_usedProperties['configuration'] = true;
            $this->configuration[$name] = new \Symfony\Config\SuluSnippetTabs\ConfigurationConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "configuration()" has already been initialized. You cannot pass values the second time you call configuration().');
        }

        return $this->configuration[$name];
    }

    public function getExtensionAlias(): string
    {
        return 'sulu_snippet_tabs';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('configuration', $value)) {
            $this->_usedProperties['configuration'] = true;
            $this->configuration = array_map(fn ($v) => new \Symfony\Config\SuluSnippetTabs\ConfigurationConfig($v), $value['configuration']);
            unset($value['configuration']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['configuration'])) {
            $output['configuration'] = array_map(fn ($v) => $v->toArray(), $this->configuration);
        }

        return $output;
    }

}
