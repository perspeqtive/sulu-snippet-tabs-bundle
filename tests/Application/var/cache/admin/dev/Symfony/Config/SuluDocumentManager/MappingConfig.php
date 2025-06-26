<?php

namespace Symfony\Config\SuluDocumentManager;

require_once __DIR__.\DIRECTORY_SEPARATOR.'MappingConfig'.\DIRECTORY_SEPARATOR.'MappingConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class MappingConfig 
{
    private $class;
    private $phpcrType;
    private $formType;
    private $syncRemoveLive;
    private $setDefaultAuthor;
    private $mapping;
    private $_usedProperties = [];

    /**
     * Fully qualified class name for mapped object
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function class($value): static
    {
        $this->_usedProperties['class'] = true;
        $this->class = $value;

        return $this;
    }

    /**
     * PHPCR type to map to
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function phpcrType($value): static
    {
        $this->_usedProperties['phpcrType'] = true;
        $this->phpcrType = $value;

        return $this;
    }

    /**
     * Form type to map to
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function formType($value): static
    {
        $this->_usedProperties['formType'] = true;
        $this->formType = $value;

        return $this;
    }

    /**
     * Should sync live workspace if node was removed
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function syncRemoveLive($value): static
    {
        $this->_usedProperties['syncRemoveLive'] = true;
        $this->syncRemoveLive = $value;

        return $this;
    }

    /**
     * Set default author if none set
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function setDefaultAuthor($value): static
    {
        $this->_usedProperties['setDefaultAuthor'] = true;
        $this->setDefaultAuthor = $value;

        return $this;
    }

    public function mapping(array $value = []): \Symfony\Config\SuluDocumentManager\MappingConfig\MappingConfig
    {
        $this->_usedProperties['mapping'] = true;

        return $this->mapping[] = new \Symfony\Config\SuluDocumentManager\MappingConfig\MappingConfig($value);
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('class', $value)) {
            $this->_usedProperties['class'] = true;
            $this->class = $value['class'];
            unset($value['class']);
        }

        if (array_key_exists('phpcr_type', $value)) {
            $this->_usedProperties['phpcrType'] = true;
            $this->phpcrType = $value['phpcr_type'];
            unset($value['phpcr_type']);
        }

        if (array_key_exists('form_type', $value)) {
            $this->_usedProperties['formType'] = true;
            $this->formType = $value['form_type'];
            unset($value['form_type']);
        }

        if (array_key_exists('sync_remove_live', $value)) {
            $this->_usedProperties['syncRemoveLive'] = true;
            $this->syncRemoveLive = $value['sync_remove_live'];
            unset($value['sync_remove_live']);
        }

        if (array_key_exists('set_default_author', $value)) {
            $this->_usedProperties['setDefaultAuthor'] = true;
            $this->setDefaultAuthor = $value['set_default_author'];
            unset($value['set_default_author']);
        }

        if (array_key_exists('mapping', $value)) {
            $this->_usedProperties['mapping'] = true;
            $this->mapping = array_map(fn ($v) => new \Symfony\Config\SuluDocumentManager\MappingConfig\MappingConfig($v), $value['mapping']);
            unset($value['mapping']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['class'])) {
            $output['class'] = $this->class;
        }
        if (isset($this->_usedProperties['phpcrType'])) {
            $output['phpcr_type'] = $this->phpcrType;
        }
        if (isset($this->_usedProperties['formType'])) {
            $output['form_type'] = $this->formType;
        }
        if (isset($this->_usedProperties['syncRemoveLive'])) {
            $output['sync_remove_live'] = $this->syncRemoveLive;
        }
        if (isset($this->_usedProperties['setDefaultAuthor'])) {
            $output['set_default_author'] = $this->setDefaultAuthor;
        }
        if (isset($this->_usedProperties['mapping'])) {
            $output['mapping'] = array_map(fn ($v) => $v->toArray(), $this->mapping);
        }

        return $output;
    }

}
