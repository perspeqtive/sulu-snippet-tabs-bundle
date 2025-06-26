<?php

namespace Symfony\Config\FosHttpCache\CacheControl;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class DefaultsConfig 
{
    private $overwrite;
    private $_usedProperties = [];

    /**
     * Whether to overwrite existing cache headers
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function overwrite($value): static
    {
        $this->_usedProperties['overwrite'] = true;
        $this->overwrite = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('overwrite', $value)) {
            $this->_usedProperties['overwrite'] = true;
            $this->overwrite = $value['overwrite'];
            unset($value['overwrite']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['overwrite'])) {
            $output['overwrite'] = $this->overwrite;
        }

        return $output;
    }

}
