<?php

namespace Symfony\Config\SuluContact\Form;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ContactConfig 
{
    private $categoryRoot;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function categoryRoot($value): static
    {
        $this->_usedProperties['categoryRoot'] = true;
        $this->categoryRoot = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('category_root', $value)) {
            $this->_usedProperties['categoryRoot'] = true;
            $this->categoryRoot = $value['category_root'];
            unset($value['category_root']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['categoryRoot'])) {
            $output['category_root'] = $this->categoryRoot;
        }

        return $output;
    }

}
