<?php

namespace Symfony\Config\SuluSecurity;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SecurityTypesConfig 
{
    private $fixture;
    private $_usedProperties = [];

    /**
     * @default '/var/www/html/vendor/sulu/sulu/src/Sulu/Bundle/SecurityBundle/DependencyInjection/../DataFixtures/security-types.xml'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function fixture($value): static
    {
        $this->_usedProperties['fixture'] = true;
        $this->fixture = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('fixture', $value)) {
            $this->_usedProperties['fixture'] = true;
            $this->fixture = $value['fixture'];
            unset($value['fixture']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['fixture'])) {
            $output['fixture'] = $this->fixture;
        }

        return $output;
    }

}
