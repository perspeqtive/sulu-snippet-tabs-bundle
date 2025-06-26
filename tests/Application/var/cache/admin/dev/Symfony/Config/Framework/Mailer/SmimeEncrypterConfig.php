<?php

namespace Symfony\Config\Framework\Mailer;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SmimeEncrypterConfig 
{
    private $enabled;
    private $repository;
    private $cipher;
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
     * S/MIME certificate repository service. This service shall implement the `Symfony\Component\Mailer\EventListener\SmimeCertificateRepositoryInterface`.
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function repository($value): static
    {
        $this->_usedProperties['repository'] = true;
        $this->repository = $value;

        return $this;
    }

    /**
     * A set of algorithms used to encrypt the message
     * @default null
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function cipher($value): static
    {
        $this->_usedProperties['cipher'] = true;
        $this->cipher = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('repository', $value)) {
            $this->_usedProperties['repository'] = true;
            $this->repository = $value['repository'];
            unset($value['repository']);
        }

        if (array_key_exists('cipher', $value)) {
            $this->_usedProperties['cipher'] = true;
            $this->cipher = $value['cipher'];
            unset($value['cipher']);
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
        if (isset($this->_usedProperties['repository'])) {
            $output['repository'] = $this->repository;
        }
        if (isset($this->_usedProperties['cipher'])) {
            $output['cipher'] = $this->cipher;
        }

        return $output;
    }

}
