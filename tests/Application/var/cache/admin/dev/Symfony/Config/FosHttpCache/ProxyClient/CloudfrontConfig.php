<?php

namespace Symfony\Config\FosHttpCache\ProxyClient;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class CloudfrontConfig 
{
    private $distributionId;
    private $client;
    private $configuration;
    private $_usedProperties = [];

    /**
     * Identifier for your CloudFront distribution you want to purge the cache for
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function distributionId($value): static
    {
        $this->_usedProperties['distributionId'] = true;
        $this->distributionId = $value;

        return $this;
    }

    /**
     * AsyncAws\CloudFront\CloudFrontClient client to use
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function client($value): static
    {
        $this->_usedProperties['client'] = true;
        $this->client = $value;

        return $this;
    }

    /**
     * Client configuration from https://async-aws.com/configuration.html
     * @default array (
     * )
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function configuration(mixed $value = array (
    )): static
    {
        $this->_usedProperties['configuration'] = true;
        $this->configuration = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('distribution_id', $value)) {
            $this->_usedProperties['distributionId'] = true;
            $this->distributionId = $value['distribution_id'];
            unset($value['distribution_id']);
        }

        if (array_key_exists('client', $value)) {
            $this->_usedProperties['client'] = true;
            $this->client = $value['client'];
            unset($value['client']);
        }

        if (array_key_exists('configuration', $value)) {
            $this->_usedProperties['configuration'] = true;
            $this->configuration = $value['configuration'];
            unset($value['configuration']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['distributionId'])) {
            $output['distribution_id'] = $this->distributionId;
        }
        if (isset($this->_usedProperties['client'])) {
            $output['client'] = $this->client;
        }
        if (isset($this->_usedProperties['configuration'])) {
            $output['configuration'] = $this->configuration;
        }

        return $output;
    }

}
