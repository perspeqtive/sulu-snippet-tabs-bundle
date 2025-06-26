<?php

namespace Symfony\Config\SuluPage;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SeoConfig 
{
    private $maxTitleLength;
    private $maxDescriptionLength;
    private $maxKeywords;
    private $keywordsSeparator;
    private $urlPrefix;
    private $_usedProperties = [];

    /**
     * @default 70
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function maxTitleLength($value): static
    {
        $this->_usedProperties['maxTitleLength'] = true;
        $this->maxTitleLength = $value;

        return $this;
    }

    /**
     * @default 160
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function maxDescriptionLength($value): static
    {
        $this->_usedProperties['maxDescriptionLength'] = true;
        $this->maxDescriptionLength = $value;

        return $this;
    }

    /**
     * @default 5
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function maxKeywords($value): static
    {
        $this->_usedProperties['maxKeywords'] = true;
        $this->maxKeywords = $value;

        return $this;
    }

    /**
     * @default ','
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function keywordsSeparator($value): static
    {
        $this->_usedProperties['keywordsSeparator'] = true;
        $this->keywordsSeparator = $value;

        return $this;
    }

    /**
     * @default 'www.yoursite.com/{locale}'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function urlPrefix($value): static
    {
        $this->_usedProperties['urlPrefix'] = true;
        $this->urlPrefix = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('max_title_length', $value)) {
            $this->_usedProperties['maxTitleLength'] = true;
            $this->maxTitleLength = $value['max_title_length'];
            unset($value['max_title_length']);
        }

        if (array_key_exists('max_description_length', $value)) {
            $this->_usedProperties['maxDescriptionLength'] = true;
            $this->maxDescriptionLength = $value['max_description_length'];
            unset($value['max_description_length']);
        }

        if (array_key_exists('max_keywords', $value)) {
            $this->_usedProperties['maxKeywords'] = true;
            $this->maxKeywords = $value['max_keywords'];
            unset($value['max_keywords']);
        }

        if (array_key_exists('keywords_separator', $value)) {
            $this->_usedProperties['keywordsSeparator'] = true;
            $this->keywordsSeparator = $value['keywords_separator'];
            unset($value['keywords_separator']);
        }

        if (array_key_exists('url_prefix', $value)) {
            $this->_usedProperties['urlPrefix'] = true;
            $this->urlPrefix = $value['url_prefix'];
            unset($value['url_prefix']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['maxTitleLength'])) {
            $output['max_title_length'] = $this->maxTitleLength;
        }
        if (isset($this->_usedProperties['maxDescriptionLength'])) {
            $output['max_description_length'] = $this->maxDescriptionLength;
        }
        if (isset($this->_usedProperties['maxKeywords'])) {
            $output['max_keywords'] = $this->maxKeywords;
        }
        if (isset($this->_usedProperties['keywordsSeparator'])) {
            $output['keywords_separator'] = $this->keywordsSeparator;
        }
        if (isset($this->_usedProperties['urlPrefix'])) {
            $output['url_prefix'] = $this->urlPrefix;
        }

        return $output;
    }

}
