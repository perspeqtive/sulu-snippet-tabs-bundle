<?php

namespace Symfony\Config\SuluMedia;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class UploadConfig 
{
    private $maxFilesize;
    private $blockedFileTypes;
    private $_usedProperties = [];

    /**
     * @default 256
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function maxFilesize($value): static
    {
        $this->_usedProperties['maxFilesize'] = true;
        $this->maxFilesize = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function blockedFileTypes(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['blockedFileTypes'] = true;
        $this->blockedFileTypes = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('max_filesize', $value)) {
            $this->_usedProperties['maxFilesize'] = true;
            $this->maxFilesize = $value['max_filesize'];
            unset($value['max_filesize']);
        }

        if (array_key_exists('blocked_file_types', $value)) {
            $this->_usedProperties['blockedFileTypes'] = true;
            $this->blockedFileTypes = $value['blocked_file_types'];
            unset($value['blocked_file_types']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['maxFilesize'])) {
            $output['max_filesize'] = $this->maxFilesize;
        }
        if (isset($this->_usedProperties['blockedFileTypes'])) {
            $output['blocked_file_types'] = $this->blockedFileTypes;
        }

        return $output;
    }

}
