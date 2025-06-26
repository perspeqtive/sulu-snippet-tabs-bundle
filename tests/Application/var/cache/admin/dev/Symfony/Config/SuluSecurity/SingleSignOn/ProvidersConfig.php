<?php

namespace Symfony\Config\SuluSecurity\SingleSignOn;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ProvidersConfig 
{
    private $dsn;
    private $defaultRoleKey;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function dsn($value): static
    {
        $this->_usedProperties['dsn'] = true;
        $this->dsn = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultRoleKey($value): static
    {
        $this->_usedProperties['defaultRoleKey'] = true;
        $this->defaultRoleKey = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('dsn', $value)) {
            $this->_usedProperties['dsn'] = true;
            $this->dsn = $value['dsn'];
            unset($value['dsn']);
        }

        if (array_key_exists('default_role_key', $value)) {
            $this->_usedProperties['defaultRoleKey'] = true;
            $this->defaultRoleKey = $value['default_role_key'];
            unset($value['default_role_key']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['dsn'])) {
            $output['dsn'] = $this->dsn;
        }
        if (isset($this->_usedProperties['defaultRoleKey'])) {
            $output['default_role_key'] = $this->defaultRoleKey;
        }

        return $output;
    }

}
