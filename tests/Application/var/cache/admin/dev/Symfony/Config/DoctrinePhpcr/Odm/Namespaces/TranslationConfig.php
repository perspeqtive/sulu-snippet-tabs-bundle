<?php

namespace Symfony\Config\DoctrinePhpcr\Odm\Namespaces;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class TranslationConfig 
{
    private $alias;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function alias($value): static
    {
        $this->_usedProperties['alias'] = true;
        $this->alias = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('alias', $value)) {
            $this->_usedProperties['alias'] = true;
            $this->alias = $value['alias'];
            unset($value['alias']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['alias'])) {
            $output['alias'] = $this->alias;
        }

        return $output;
    }

}
