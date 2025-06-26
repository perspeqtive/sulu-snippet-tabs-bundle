<?php

namespace Symfony\Config\SuluAdmin\FieldTypeOptions\SingleSelectionConfig\Types;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ListOverlayConfig 
{
    private $adapter;
    private $detailOptions;
    private $listKey;
    private $displayProperties;
    private $icon;
    private $emptyText;
    private $overlayTitle;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function adapter($value): static
    {
        $this->_usedProperties['adapter'] = true;
        $this->adapter = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function detailOptions(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['detailOptions'] = true;
        $this->detailOptions = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function listKey($value): static
    {
        $this->_usedProperties['listKey'] = true;
        $this->listKey = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function displayProperties(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['displayProperties'] = true;
        $this->displayProperties = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function icon($value): static
    {
        $this->_usedProperties['icon'] = true;
        $this->icon = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function emptyText($value): static
    {
        $this->_usedProperties['emptyText'] = true;
        $this->emptyText = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function overlayTitle($value): static
    {
        $this->_usedProperties['overlayTitle'] = true;
        $this->overlayTitle = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('adapter', $value)) {
            $this->_usedProperties['adapter'] = true;
            $this->adapter = $value['adapter'];
            unset($value['adapter']);
        }

        if (array_key_exists('detail_options', $value)) {
            $this->_usedProperties['detailOptions'] = true;
            $this->detailOptions = $value['detail_options'];
            unset($value['detail_options']);
        }

        if (array_key_exists('list_key', $value)) {
            $this->_usedProperties['listKey'] = true;
            $this->listKey = $value['list_key'];
            unset($value['list_key']);
        }

        if (array_key_exists('display_properties', $value)) {
            $this->_usedProperties['displayProperties'] = true;
            $this->displayProperties = $value['display_properties'];
            unset($value['display_properties']);
        }

        if (array_key_exists('icon', $value)) {
            $this->_usedProperties['icon'] = true;
            $this->icon = $value['icon'];
            unset($value['icon']);
        }

        if (array_key_exists('empty_text', $value)) {
            $this->_usedProperties['emptyText'] = true;
            $this->emptyText = $value['empty_text'];
            unset($value['empty_text']);
        }

        if (array_key_exists('overlay_title', $value)) {
            $this->_usedProperties['overlayTitle'] = true;
            $this->overlayTitle = $value['overlay_title'];
            unset($value['overlay_title']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['adapter'])) {
            $output['adapter'] = $this->adapter;
        }
        if (isset($this->_usedProperties['detailOptions'])) {
            $output['detail_options'] = $this->detailOptions;
        }
        if (isset($this->_usedProperties['listKey'])) {
            $output['list_key'] = $this->listKey;
        }
        if (isset($this->_usedProperties['displayProperties'])) {
            $output['display_properties'] = $this->displayProperties;
        }
        if (isset($this->_usedProperties['icon'])) {
            $output['icon'] = $this->icon;
        }
        if (isset($this->_usedProperties['emptyText'])) {
            $output['empty_text'] = $this->emptyText;
        }
        if (isset($this->_usedProperties['overlayTitle'])) {
            $output['overlay_title'] = $this->overlayTitle;
        }

        return $output;
    }

}
