<?php

namespace Symfony\Config\Security\FirewallConfig\AccessToken\TokenHandler\Oidc;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class EncryptionConfig 
{
    private $enabled;
    private $enforce;
    private $algorithms;
    private $keyset;
    private $_usedProperties = [];

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): static
    {
        $this->_usedProperties['enabled'] = true;
        $this->enabled = $value;

        return $this;
    }

    /**
     * When enabled, the token shall be encrypted.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enforce($value): static
    {
        $this->_usedProperties['enforce'] = true;
        $this->enforce = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function algorithms(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['algorithms'] = true;
        $this->algorithms = $value;

        return $this;
    }

    /**
     * JSON-encoded JWKSet used to decrypt the token (must contain a list of valid private keys).
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function keyset($value): static
    {
        $this->_usedProperties['keyset'] = true;
        $this->keyset = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('enforce', $value)) {
            $this->_usedProperties['enforce'] = true;
            $this->enforce = $value['enforce'];
            unset($value['enforce']);
        }

        if (array_key_exists('algorithms', $value)) {
            $this->_usedProperties['algorithms'] = true;
            $this->algorithms = $value['algorithms'];
            unset($value['algorithms']);
        }

        if (array_key_exists('keyset', $value)) {
            $this->_usedProperties['keyset'] = true;
            $this->keyset = $value['keyset'];
            unset($value['keyset']);
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
        if (isset($this->_usedProperties['enforce'])) {
            $output['enforce'] = $this->enforce;
        }
        if (isset($this->_usedProperties['algorithms'])) {
            $output['algorithms'] = $this->algorithms;
        }
        if (isset($this->_usedProperties['keyset'])) {
            $output['keyset'] = $this->keyset;
        }

        return $output;
    }

}
