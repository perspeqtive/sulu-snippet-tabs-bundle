<?php

namespace Symfony\Config\SuluDocumentManager;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SessionsConfig 
{
    private $backend;
    private $workspace;
    private $username;
    private $password;
    private $_usedProperties = [];

    /**
     * @return $this
     */
    public function backend(string $name, mixed $value): static
    {
        $this->_usedProperties['backend'] = true;
        $this->backend[$name] = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function workspace($value): static
    {
        $this->_usedProperties['workspace'] = true;
        $this->workspace = $value;

        return $this;
    }

    /**
     * @default 'admin'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function username($value): static
    {
        $this->_usedProperties['username'] = true;
        $this->username = $value;

        return $this;
    }

    /**
     * @default 'admin'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function password($value): static
    {
        $this->_usedProperties['password'] = true;
        $this->password = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('backend', $value)) {
            $this->_usedProperties['backend'] = true;
            $this->backend = $value['backend'];
            unset($value['backend']);
        }

        if (array_key_exists('workspace', $value)) {
            $this->_usedProperties['workspace'] = true;
            $this->workspace = $value['workspace'];
            unset($value['workspace']);
        }

        if (array_key_exists('username', $value)) {
            $this->_usedProperties['username'] = true;
            $this->username = $value['username'];
            unset($value['username']);
        }

        if (array_key_exists('password', $value)) {
            $this->_usedProperties['password'] = true;
            $this->password = $value['password'];
            unset($value['password']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['backend'])) {
            $output['backend'] = $this->backend;
        }
        if (isset($this->_usedProperties['workspace'])) {
            $output['workspace'] = $this->workspace;
        }
        if (isset($this->_usedProperties['username'])) {
            $output['username'] = $this->username;
        }
        if (isset($this->_usedProperties['password'])) {
            $output['password'] = $this->password;
        }

        return $output;
    }

}
