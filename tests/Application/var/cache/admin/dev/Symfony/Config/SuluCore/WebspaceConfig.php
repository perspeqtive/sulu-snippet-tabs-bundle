<?php

namespace Symfony\Config\SuluCore;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class WebspaceConfig 
{
    private $configDir;
    private $_usedProperties = [];

    /**
     * @default '%kernel.project_dir%/config/webspaces'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function configDir($value): static
    {
        $this->_usedProperties['configDir'] = true;
        $this->configDir = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('config_dir', $value)) {
            $this->_usedProperties['configDir'] = true;
            $this->configDir = $value['config_dir'];
            unset($value['config_dir']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['configDir'])) {
            $output['config_dir'] = $this->configDir;
        }

        return $output;
    }

}
