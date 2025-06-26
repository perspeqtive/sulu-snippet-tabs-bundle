<?php

namespace Symfony\Config\SuluSnippetTabs\ConfigurationConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class TabsConfig 
{
    private $title;
    private $formKey;
    private $order;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function title($value): static
    {
        $this->_usedProperties['title'] = true;
        $this->title = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function formKey($value): static
    {
        $this->_usedProperties['formKey'] = true;
        $this->formKey = $value;

        return $this;
    }

    /**
     * @default 0
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function order($value): static
    {
        $this->_usedProperties['order'] = true;
        $this->order = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('title', $value)) {
            $this->_usedProperties['title'] = true;
            $this->title = $value['title'];
            unset($value['title']);
        }

        if (array_key_exists('form_key', $value)) {
            $this->_usedProperties['formKey'] = true;
            $this->formKey = $value['form_key'];
            unset($value['form_key']);
        }

        if (array_key_exists('order', $value)) {
            $this->_usedProperties['order'] = true;
            $this->order = $value['order'];
            unset($value['order']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['title'])) {
            $output['title'] = $this->title;
        }
        if (isset($this->_usedProperties['formKey'])) {
            $output['form_key'] = $this->formKey;
        }
        if (isset($this->_usedProperties['order'])) {
            $output['order'] = $this->order;
        }

        return $output;
    }

}
