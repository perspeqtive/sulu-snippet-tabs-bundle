<?php

namespace Symfony\Config\DoctrinePhpcr\Session;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SessionConfig'.\DIRECTORY_SEPARATOR.'BackendConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SessionConfig 
{
    private $workspace;
    private $username;
    private $password;
    private $adminUsername;
    private $adminPassword;
    private $backend;
    private $options;
    private $_usedProperties = [];

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
     * @default null
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
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function password($value): static
    {
        $this->_usedProperties['password'] = true;
        $this->password = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function adminUsername($value): static
    {
        $this->_usedProperties['adminUsername'] = true;
        $this->adminUsername = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function adminPassword($value): static
    {
        $this->_usedProperties['adminPassword'] = true;
        $this->adminPassword = $value;

        return $this;
    }

    /**
     * @template TValue
     * @param TValue $value
     * @default {"type":"jackrabbit","factory":null,"logging":false,"profiling":false,"backtrace":false,"parameters":[],"curl_options":[]}
     * @return \Symfony\Config\DoctrinePhpcr\Session\SessionConfig\BackendConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\DoctrinePhpcr\Session\SessionConfig\BackendConfig : static)
     */
    public function backend(array $value = []): \Symfony\Config\DoctrinePhpcr\Session\SessionConfig\BackendConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['backend'] = true;
            $this->backend = $value;

            return $this;
        }

        if (!$this->backend instanceof \Symfony\Config\DoctrinePhpcr\Session\SessionConfig\BackendConfig) {
            $this->_usedProperties['backend'] = true;
            $this->backend = new \Symfony\Config\DoctrinePhpcr\Session\SessionConfig\BackendConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "backend()" has already been initialized. You cannot pass values the second time you call backend().');
        }

        return $this->backend;
    }

    /**
     * @return $this
     */
    public function options(string $name, mixed $value): static
    {
        $this->_usedProperties['options'] = true;
        $this->options[$name] = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
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

        if (array_key_exists('admin_username', $value)) {
            $this->_usedProperties['adminUsername'] = true;
            $this->adminUsername = $value['admin_username'];
            unset($value['admin_username']);
        }

        if (array_key_exists('admin_password', $value)) {
            $this->_usedProperties['adminPassword'] = true;
            $this->adminPassword = $value['admin_password'];
            unset($value['admin_password']);
        }

        if (array_key_exists('backend', $value)) {
            $this->_usedProperties['backend'] = true;
            $this->backend = \is_array($value['backend']) ? new \Symfony\Config\DoctrinePhpcr\Session\SessionConfig\BackendConfig($value['backend']) : $value['backend'];
            unset($value['backend']);
        }

        if (array_key_exists('options', $value)) {
            $this->_usedProperties['options'] = true;
            $this->options = $value['options'];
            unset($value['options']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['workspace'])) {
            $output['workspace'] = $this->workspace;
        }
        if (isset($this->_usedProperties['username'])) {
            $output['username'] = $this->username;
        }
        if (isset($this->_usedProperties['password'])) {
            $output['password'] = $this->password;
        }
        if (isset($this->_usedProperties['adminUsername'])) {
            $output['admin_username'] = $this->adminUsername;
        }
        if (isset($this->_usedProperties['adminPassword'])) {
            $output['admin_password'] = $this->adminPassword;
        }
        if (isset($this->_usedProperties['backend'])) {
            $output['backend'] = $this->backend instanceof \Symfony\Config\DoctrinePhpcr\Session\SessionConfig\BackendConfig ? $this->backend->toArray() : $this->backend;
        }
        if (isset($this->_usedProperties['options'])) {
            $output['options'] = $this->options;
        }

        return $output;
    }

}
