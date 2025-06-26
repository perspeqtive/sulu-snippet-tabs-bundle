<?php

namespace Symfony\Config\MassiveSearch\Adapters;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ZendLuceneConfig 
{
    private $hideIndexException;
    private $basepath;
    private $encoding;
    private $_usedProperties = [];

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function hideIndexException($value): static
    {
        $this->_usedProperties['hideIndexException'] = true;
        $this->hideIndexException = $value;

        return $this;
    }

    /**
     * @default '%kernel.root_dir%/data'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function basepath($value): static
    {
        $this->_usedProperties['basepath'] = true;
        $this->basepath = $value;

        return $this;
    }

    /**
     * @default 'UTF-8'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function encoding($value): static
    {
        $this->_usedProperties['encoding'] = true;
        $this->encoding = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('hide_index_exception', $value)) {
            $this->_usedProperties['hideIndexException'] = true;
            $this->hideIndexException = $value['hide_index_exception'];
            unset($value['hide_index_exception']);
        }

        if (array_key_exists('basepath', $value)) {
            $this->_usedProperties['basepath'] = true;
            $this->basepath = $value['basepath'];
            unset($value['basepath']);
        }

        if (array_key_exists('encoding', $value)) {
            $this->_usedProperties['encoding'] = true;
            $this->encoding = $value['encoding'];
            unset($value['encoding']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['hideIndexException'])) {
            $output['hide_index_exception'] = $this->hideIndexException;
        }
        if (isset($this->_usedProperties['basepath'])) {
            $output['basepath'] = $this->basepath;
        }
        if (isset($this->_usedProperties['encoding'])) {
            $output['encoding'] = $this->encoding;
        }

        return $output;
    }

}
