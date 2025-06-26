<?php

namespace Symfony\Config\SuluAdmin;

require_once __DIR__.\DIRECTORY_SEPARATOR.'FieldTypeOptions'.\DIRECTORY_SEPARATOR.'SelectionConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FieldTypeOptions'.\DIRECTORY_SEPARATOR.'SingleSelectionConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FieldTypeOptionsConfig 
{
    private $selection;
    private $singleSelection;
    private $_usedProperties = [];

    public function selection(string $name, array $value = []): \Symfony\Config\SuluAdmin\FieldTypeOptions\SelectionConfig
    {
        if (!isset($this->selection[$name])) {
            $this->_usedProperties['selection'] = true;
            $this->selection[$name] = new \Symfony\Config\SuluAdmin\FieldTypeOptions\SelectionConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "selection()" has already been initialized. You cannot pass values the second time you call selection().');
        }

        return $this->selection[$name];
    }

    public function singleSelection(string $name, array $value = []): \Symfony\Config\SuluAdmin\FieldTypeOptions\SingleSelectionConfig
    {
        if (!isset($this->singleSelection[$name])) {
            $this->_usedProperties['singleSelection'] = true;
            $this->singleSelection[$name] = new \Symfony\Config\SuluAdmin\FieldTypeOptions\SingleSelectionConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "singleSelection()" has already been initialized. You cannot pass values the second time you call singleSelection().');
        }

        return $this->singleSelection[$name];
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('selection', $value)) {
            $this->_usedProperties['selection'] = true;
            $this->selection = array_map(fn ($v) => new \Symfony\Config\SuluAdmin\FieldTypeOptions\SelectionConfig($v), $value['selection']);
            unset($value['selection']);
        }

        if (array_key_exists('single_selection', $value)) {
            $this->_usedProperties['singleSelection'] = true;
            $this->singleSelection = array_map(fn ($v) => new \Symfony\Config\SuluAdmin\FieldTypeOptions\SingleSelectionConfig($v), $value['single_selection']);
            unset($value['single_selection']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['selection'])) {
            $output['selection'] = array_map(fn ($v) => $v->toArray(), $this->selection);
        }
        if (isset($this->_usedProperties['singleSelection'])) {
            $output['single_selection'] = array_map(fn ($v) => $v->toArray(), $this->singleSelection);
        }

        return $output;
    }

}
