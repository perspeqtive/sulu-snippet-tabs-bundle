<?php

namespace Symfony\Config\SuluContact;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class DefaultsConfig 
{
    private $phoneType;
    private $phoneTypeMobile;
    private $phoneTypeIsdn;
    private $emailType;
    private $addressType;
    private $urlType;
    private $faxType;
    private $socialMediaProfileType;
    private $country;
    private $_usedProperties = [];

    /**
     * @default '1'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function phoneType($value): static
    {
        $this->_usedProperties['phoneType'] = true;
        $this->phoneType = $value;

        return $this;
    }

    /**
     * @default '3'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function phoneTypeMobile($value): static
    {
        $this->_usedProperties['phoneTypeMobile'] = true;
        $this->phoneTypeMobile = $value;

        return $this;
    }

    /**
     * @default '1'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function phoneTypeIsdn($value): static
    {
        $this->_usedProperties['phoneTypeIsdn'] = true;
        $this->phoneTypeIsdn = $value;

        return $this;
    }

    /**
     * @default '1'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function emailType($value): static
    {
        $this->_usedProperties['emailType'] = true;
        $this->emailType = $value;

        return $this;
    }

    /**
     * @default '1'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function addressType($value): static
    {
        $this->_usedProperties['addressType'] = true;
        $this->addressType = $value;

        return $this;
    }

    /**
     * @default '1'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function urlType($value): static
    {
        $this->_usedProperties['urlType'] = true;
        $this->urlType = $value;

        return $this;
    }

    /**
     * @default '1'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function faxType($value): static
    {
        $this->_usedProperties['faxType'] = true;
        $this->faxType = $value;

        return $this;
    }

    /**
     * @default '1'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function socialMediaProfileType($value): static
    {
        $this->_usedProperties['socialMediaProfileType'] = true;
        $this->socialMediaProfileType = $value;

        return $this;
    }

    /**
     * @default 'AT'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function country($value): static
    {
        $this->_usedProperties['country'] = true;
        $this->country = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('phoneType', $value)) {
            $this->_usedProperties['phoneType'] = true;
            $this->phoneType = $value['phoneType'];
            unset($value['phoneType']);
        }

        if (array_key_exists('phoneTypeMobile', $value)) {
            $this->_usedProperties['phoneTypeMobile'] = true;
            $this->phoneTypeMobile = $value['phoneTypeMobile'];
            unset($value['phoneTypeMobile']);
        }

        if (array_key_exists('phoneTypeIsdn', $value)) {
            $this->_usedProperties['phoneTypeIsdn'] = true;
            $this->phoneTypeIsdn = $value['phoneTypeIsdn'];
            unset($value['phoneTypeIsdn']);
        }

        if (array_key_exists('emailType', $value)) {
            $this->_usedProperties['emailType'] = true;
            $this->emailType = $value['emailType'];
            unset($value['emailType']);
        }

        if (array_key_exists('addressType', $value)) {
            $this->_usedProperties['addressType'] = true;
            $this->addressType = $value['addressType'];
            unset($value['addressType']);
        }

        if (array_key_exists('urlType', $value)) {
            $this->_usedProperties['urlType'] = true;
            $this->urlType = $value['urlType'];
            unset($value['urlType']);
        }

        if (array_key_exists('faxType', $value)) {
            $this->_usedProperties['faxType'] = true;
            $this->faxType = $value['faxType'];
            unset($value['faxType']);
        }

        if (array_key_exists('socialMediaProfileType', $value)) {
            $this->_usedProperties['socialMediaProfileType'] = true;
            $this->socialMediaProfileType = $value['socialMediaProfileType'];
            unset($value['socialMediaProfileType']);
        }

        if (array_key_exists('country', $value)) {
            $this->_usedProperties['country'] = true;
            $this->country = $value['country'];
            unset($value['country']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['phoneType'])) {
            $output['phoneType'] = $this->phoneType;
        }
        if (isset($this->_usedProperties['phoneTypeMobile'])) {
            $output['phoneTypeMobile'] = $this->phoneTypeMobile;
        }
        if (isset($this->_usedProperties['phoneTypeIsdn'])) {
            $output['phoneTypeIsdn'] = $this->phoneTypeIsdn;
        }
        if (isset($this->_usedProperties['emailType'])) {
            $output['emailType'] = $this->emailType;
        }
        if (isset($this->_usedProperties['addressType'])) {
            $output['addressType'] = $this->addressType;
        }
        if (isset($this->_usedProperties['urlType'])) {
            $output['urlType'] = $this->urlType;
        }
        if (isset($this->_usedProperties['faxType'])) {
            $output['faxType'] = $this->faxType;
        }
        if (isset($this->_usedProperties['socialMediaProfileType'])) {
            $output['socialMediaProfileType'] = $this->socialMediaProfileType;
        }
        if (isset($this->_usedProperties['country'])) {
            $output['country'] = $this->country;
        }

        return $output;
    }

}
