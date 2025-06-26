<?php

namespace Symfony\Config\SuluPage;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Search'.\DIRECTORY_SEPARATOR.'MappingConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SearchConfig 
{
    private $mapping;
    private $_usedProperties = [];

    public function mapping(string $structure_type, array $value = []): \Symfony\Config\SuluPage\Search\MappingConfig
    {
        if (!isset($this->mapping[$structure_type])) {
            $this->_usedProperties['mapping'] = true;
            $this->mapping[$structure_type] = new \Symfony\Config\SuluPage\Search\MappingConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "mapping()" has already been initialized. You cannot pass values the second time you call mapping().');
        }

        return $this->mapping[$structure_type];
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('mapping', $value)) {
            $this->_usedProperties['mapping'] = true;
            $this->mapping = array_map(fn ($v) => new \Symfony\Config\SuluPage\Search\MappingConfig($v), $value['mapping']);
            unset($value['mapping']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['mapping'])) {
            $output['mapping'] = array_map(fn ($v) => $v->toArray(), $this->mapping);
        }

        return $output;
    }

}
