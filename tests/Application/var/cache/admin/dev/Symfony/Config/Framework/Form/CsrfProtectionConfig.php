<?php

namespace Symfony\Config\Framework\Form;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class CsrfProtectionConfig 
{
    private $enabled;
    private $tokenId;
    private $fieldName;
    private $fieldAttr;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function enabled($value): static
    {
        $this->_usedProperties['enabled'] = true;
        $this->enabled = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function tokenId($value): static
    {
        $this->_usedProperties['tokenId'] = true;
        $this->tokenId = $value;

        return $this;
    }

    /**
     * @default '_token'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function fieldName($value): static
    {
        $this->_usedProperties['fieldName'] = true;
        $this->fieldName = $value;

        return $this;
    }

    /**
     * @return $this
     */
    public function fieldAttr(string $name, mixed $value): static
    {
        $this->_usedProperties['fieldAttr'] = true;
        $this->fieldAttr[$name] = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('token_id', $value)) {
            $this->_usedProperties['tokenId'] = true;
            $this->tokenId = $value['token_id'];
            unset($value['token_id']);
        }

        if (array_key_exists('field_name', $value)) {
            $this->_usedProperties['fieldName'] = true;
            $this->fieldName = $value['field_name'];
            unset($value['field_name']);
        }

        if (array_key_exists('field_attr', $value)) {
            $this->_usedProperties['fieldAttr'] = true;
            $this->fieldAttr = $value['field_attr'];
            unset($value['field_attr']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['enabled'])) {
            $output['enabled'] = $this->enabled;
        }
        if (isset($this->_usedProperties['tokenId'])) {
            $output['token_id'] = $this->tokenId;
        }
        if (isset($this->_usedProperties['fieldName'])) {
            $output['field_name'] = $this->fieldName;
        }
        if (isset($this->_usedProperties['fieldAttr'])) {
            $output['field_attr'] = $this->fieldAttr;
        }

        return $output;
    }

}
