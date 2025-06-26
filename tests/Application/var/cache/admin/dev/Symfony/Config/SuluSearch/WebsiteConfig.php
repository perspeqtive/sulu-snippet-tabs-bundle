<?php

namespace Symfony\Config\SuluSearch;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class WebsiteConfig 
{
    private $indexes;
    private $_usedProperties = [];

    /**
     * @return $this
     */
    public function indexes(string $key, mixed $value): static
    {
        $this->_usedProperties['indexes'] = true;
        $this->indexes[$key] = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('indexes', $value)) {
            $this->_usedProperties['indexes'] = true;
            $this->indexes = $value['indexes'];
            unset($value['indexes']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['indexes'])) {
            $output['indexes'] = $this->indexes;
        }

        return $output;
    }

}
