<?php

namespace Symfony\Config\FosHttpCache\Cacheable;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ResponseConfig 
{
    private $additionalStatus;
    private $expression;
    private $_usedProperties = [];

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function additionalStatus(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['additionalStatus'] = true;
        $this->additionalStatus = $value;

        return $this;
    }

    /**
     * Expression to decide whether response is cacheable. Replaces the default status codes.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function expression($value): static
    {
        $this->_usedProperties['expression'] = true;
        $this->expression = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('additional_status', $value)) {
            $this->_usedProperties['additionalStatus'] = true;
            $this->additionalStatus = $value['additional_status'];
            unset($value['additional_status']);
        }

        if (array_key_exists('expression', $value)) {
            $this->_usedProperties['expression'] = true;
            $this->expression = $value['expression'];
            unset($value['expression']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['additionalStatus'])) {
            $output['additional_status'] = $this->additionalStatus;
        }
        if (isset($this->_usedProperties['expression'])) {
            $output['expression'] = $this->expression;
        }

        return $output;
    }

}
