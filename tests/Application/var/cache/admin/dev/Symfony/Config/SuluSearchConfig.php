<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluSearch'.\DIRECTORY_SEPARATOR.'IndexesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluSearch'.\DIRECTORY_SEPARATOR.'WebsiteConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SuluSearchConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $indexes;
    private $website;
    private $_usedProperties = [];

    public function indexes(string $index_name, array $value = []): \Symfony\Config\SuluSearch\IndexesConfig
    {
        if (!isset($this->indexes[$index_name])) {
            $this->_usedProperties['indexes'] = true;
            $this->indexes[$index_name] = new \Symfony\Config\SuluSearch\IndexesConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "indexes()" has already been initialized. You cannot pass values the second time you call indexes().');
        }

        return $this->indexes[$index_name];
    }

    /**
     * @default {"indexes":[]}
    */
    public function website(array $value = []): \Symfony\Config\SuluSearch\WebsiteConfig
    {
        if (null === $this->website) {
            $this->_usedProperties['website'] = true;
            $this->website = new \Symfony\Config\SuluSearch\WebsiteConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "website()" has already been initialized. You cannot pass values the second time you call website().');
        }

        return $this->website;
    }

    public function getExtensionAlias(): string
    {
        return 'sulu_search';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('indexes', $value)) {
            $this->_usedProperties['indexes'] = true;
            $this->indexes = array_map(fn ($v) => new \Symfony\Config\SuluSearch\IndexesConfig($v), $value['indexes']);
            unset($value['indexes']);
        }

        if (array_key_exists('website', $value)) {
            $this->_usedProperties['website'] = true;
            $this->website = new \Symfony\Config\SuluSearch\WebsiteConfig($value['website']);
            unset($value['website']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['indexes'])) {
            $output['indexes'] = array_map(fn ($v) => $v->toArray(), $this->indexes);
        }
        if (isset($this->_usedProperties['website'])) {
            $output['website'] = $this->website->toArray();
        }

        return $output;
    }

}
