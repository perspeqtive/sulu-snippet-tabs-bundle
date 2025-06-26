<?php

namespace Symfony\Config\Framework;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class CsrfProtectionConfig 
{
    private $enabled;
    private $statelessTokenIds;
    private $checkHeader;
    private $cookieName;
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
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function statelessTokenIds(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['statelessTokenIds'] = true;
        $this->statelessTokenIds = $value;

        return $this;
    }

    /**
     * Whether to check the CSRF token in a header in addition to a cookie when using stateless protection.
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function checkHeader($value): static
    {
        $this->_usedProperties['checkHeader'] = true;
        $this->checkHeader = $value;

        return $this;
    }

    /**
     * The name of the cookie to use when using stateless protection.
     * @default 'csrf-token'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function cookieName($value): static
    {
        $this->_usedProperties['cookieName'] = true;
        $this->cookieName = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('stateless_token_ids', $value)) {
            $this->_usedProperties['statelessTokenIds'] = true;
            $this->statelessTokenIds = $value['stateless_token_ids'];
            unset($value['stateless_token_ids']);
        }

        if (array_key_exists('check_header', $value)) {
            $this->_usedProperties['checkHeader'] = true;
            $this->checkHeader = $value['check_header'];
            unset($value['check_header']);
        }

        if (array_key_exists('cookie_name', $value)) {
            $this->_usedProperties['cookieName'] = true;
            $this->cookieName = $value['cookie_name'];
            unset($value['cookie_name']);
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
        if (isset($this->_usedProperties['statelessTokenIds'])) {
            $output['stateless_token_ids'] = $this->statelessTokenIds;
        }
        if (isset($this->_usedProperties['checkHeader'])) {
            $output['check_header'] = $this->checkHeader;
        }
        if (isset($this->_usedProperties['cookieName'])) {
            $output['cookie_name'] = $this->cookieName;
        }

        return $output;
    }

}
