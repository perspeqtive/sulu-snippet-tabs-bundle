<?php

namespace Symfony\Config\SuluMedia\SystemCollectionsConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class CollectionsConfig 
{
    private $metaTitle;
    private $_usedProperties = [];

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function metaTitle(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['metaTitle'] = true;
        $this->metaTitle = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('meta_title', $value)) {
            $this->_usedProperties['metaTitle'] = true;
            $this->metaTitle = $value['meta_title'];
            unset($value['meta_title']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['metaTitle'])) {
            $output['meta_title'] = $this->metaTitle;
        }

        return $output;
    }

}
