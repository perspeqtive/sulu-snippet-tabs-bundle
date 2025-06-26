<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluPage'.\DIRECTORY_SEPARATOR.'SeoConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluPage'.\DIRECTORY_SEPARATOR.'SearchConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SuluPageConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $defaultAuthor;
    private $seo;
    private $search;
    private $_usedProperties = [];

    /**
     * Set default author if none isset
     * @default true
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultAuthor($value): static
    {
        $this->_usedProperties['defaultAuthor'] = true;
        $this->defaultAuthor = $value;

        return $this;
    }

    /**
     * @default {"max_title_length":70,"max_description_length":160,"max_keywords":5,"keywords_separator":",","url_prefix":"www.yoursite.com\/{locale}"}
    */
    public function seo(array $value = []): \Symfony\Config\SuluPage\SeoConfig
    {
        if (null === $this->seo) {
            $this->_usedProperties['seo'] = true;
            $this->seo = new \Symfony\Config\SuluPage\SeoConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "seo()" has already been initialized. You cannot pass values the second time you call seo().');
        }

        return $this->seo;
    }

    /**
     * @default {"mapping":[]}
    */
    public function search(array $value = []): \Symfony\Config\SuluPage\SearchConfig
    {
        if (null === $this->search) {
            $this->_usedProperties['search'] = true;
            $this->search = new \Symfony\Config\SuluPage\SearchConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "search()" has already been initialized. You cannot pass values the second time you call search().');
        }

        return $this->search;
    }

    public function getExtensionAlias(): string
    {
        return 'sulu_page';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('default_author', $value)) {
            $this->_usedProperties['defaultAuthor'] = true;
            $this->defaultAuthor = $value['default_author'];
            unset($value['default_author']);
        }

        if (array_key_exists('seo', $value)) {
            $this->_usedProperties['seo'] = true;
            $this->seo = new \Symfony\Config\SuluPage\SeoConfig($value['seo']);
            unset($value['seo']);
        }

        if (array_key_exists('search', $value)) {
            $this->_usedProperties['search'] = true;
            $this->search = new \Symfony\Config\SuluPage\SearchConfig($value['search']);
            unset($value['search']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['defaultAuthor'])) {
            $output['default_author'] = $this->defaultAuthor;
        }
        if (isset($this->_usedProperties['seo'])) {
            $output['seo'] = $this->seo->toArray();
        }
        if (isset($this->_usedProperties['search'])) {
            $output['search'] = $this->search->toArray();
        }

        return $output;
    }

}
