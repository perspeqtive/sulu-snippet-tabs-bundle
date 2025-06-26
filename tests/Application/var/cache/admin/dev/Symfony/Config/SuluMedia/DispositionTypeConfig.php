<?php

namespace Symfony\Config\SuluMedia;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class DispositionTypeConfig 
{
    private $default;
    private $mimeTypesInline;
    private $mimeTypesAttachment;
    private $_usedProperties = [];

    /**
     * @default 'attachment'
     * @param ParamConfigurator|'inline'|'attachment' $value
     * @return $this
     */
    public function default($value): static
    {
        $this->_usedProperties['default'] = true;
        $this->default = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function mimeTypesInline(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['mimeTypesInline'] = true;
        $this->mimeTypesInline = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function mimeTypesAttachment(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['mimeTypesAttachment'] = true;
        $this->mimeTypesAttachment = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('default', $value)) {
            $this->_usedProperties['default'] = true;
            $this->default = $value['default'];
            unset($value['default']);
        }

        if (array_key_exists('mime_types_inline', $value)) {
            $this->_usedProperties['mimeTypesInline'] = true;
            $this->mimeTypesInline = $value['mime_types_inline'];
            unset($value['mime_types_inline']);
        }

        if (array_key_exists('mime_types_attachment', $value)) {
            $this->_usedProperties['mimeTypesAttachment'] = true;
            $this->mimeTypesAttachment = $value['mime_types_attachment'];
            unset($value['mime_types_attachment']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['default'])) {
            $output['default'] = $this->default;
        }
        if (isset($this->_usedProperties['mimeTypesInline'])) {
            $output['mime_types_inline'] = $this->mimeTypesInline;
        }
        if (isset($this->_usedProperties['mimeTypesAttachment'])) {
            $output['mime_types_attachment'] = $this->mimeTypesAttachment;
        }

        return $output;
    }

}
