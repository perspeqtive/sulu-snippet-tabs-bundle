<?php

namespace Symfony\Config\SuluWebsite;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class DefaultLocaleConfig 
{
    private $providerServiceId;
    private $_usedProperties = [];

    /**
     * @default 'sulu_website.default_locale.portal_provider'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function providerServiceId($value): static
    {
        $this->_usedProperties['providerServiceId'] = true;
        $this->providerServiceId = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('provider_service_id', $value)) {
            $this->_usedProperties['providerServiceId'] = true;
            $this->providerServiceId = $value['provider_service_id'];
            unset($value['provider_service_id']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['providerServiceId'])) {
            $output['provider_service_id'] = $this->providerServiceId;
        }

        return $output;
    }

}
