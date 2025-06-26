<?php

namespace Symfony\Config\SuluCategory;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Objects'.\DIRECTORY_SEPARATOR.'CategoryConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Objects'.\DIRECTORY_SEPARATOR.'CategoryMetaConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Objects'.\DIRECTORY_SEPARATOR.'CategoryTranslationConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Objects'.\DIRECTORY_SEPARATOR.'KeywordConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ObjectsConfig 
{
    private $category;
    private $categoryMeta;
    private $categoryTranslation;
    private $keyword;
    private $_usedProperties = [];

    /**
     * @default {"model":"Sulu\\Bundle\\CategoryBundle\\Entity\\Category","repository":"Sulu\\Bundle\\CategoryBundle\\Entity\\CategoryRepository"}
    */
    public function category(array $value = []): \Symfony\Config\SuluCategory\Objects\CategoryConfig
    {
        if (null === $this->category) {
            $this->_usedProperties['category'] = true;
            $this->category = new \Symfony\Config\SuluCategory\Objects\CategoryConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "category()" has already been initialized. You cannot pass values the second time you call category().');
        }

        return $this->category;
    }

    /**
     * @default {"model":"Sulu\\Bundle\\CategoryBundle\\Entity\\CategoryMeta","repository":"Sulu\\Bundle\\CategoryBundle\\Entity\\CategoryMetaRepository"}
    */
    public function categoryMeta(array $value = []): \Symfony\Config\SuluCategory\Objects\CategoryMetaConfig
    {
        if (null === $this->categoryMeta) {
            $this->_usedProperties['categoryMeta'] = true;
            $this->categoryMeta = new \Symfony\Config\SuluCategory\Objects\CategoryMetaConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "categoryMeta()" has already been initialized. You cannot pass values the second time you call categoryMeta().');
        }

        return $this->categoryMeta;
    }

    /**
     * @default {"model":"Sulu\\Bundle\\CategoryBundle\\Entity\\CategoryTranslation","repository":"Sulu\\Bundle\\CategoryBundle\\Entity\\CategoryTranslationRepository"}
    */
    public function categoryTranslation(array $value = []): \Symfony\Config\SuluCategory\Objects\CategoryTranslationConfig
    {
        if (null === $this->categoryTranslation) {
            $this->_usedProperties['categoryTranslation'] = true;
            $this->categoryTranslation = new \Symfony\Config\SuluCategory\Objects\CategoryTranslationConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "categoryTranslation()" has already been initialized. You cannot pass values the second time you call categoryTranslation().');
        }

        return $this->categoryTranslation;
    }

    /**
     * @default {"model":"Sulu\\Bundle\\CategoryBundle\\Entity\\Keyword","repository":"Sulu\\Bundle\\CategoryBundle\\Entity\\KeywordRepository"}
    */
    public function keyword(array $value = []): \Symfony\Config\SuluCategory\Objects\KeywordConfig
    {
        if (null === $this->keyword) {
            $this->_usedProperties['keyword'] = true;
            $this->keyword = new \Symfony\Config\SuluCategory\Objects\KeywordConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "keyword()" has already been initialized. You cannot pass values the second time you call keyword().');
        }

        return $this->keyword;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('category', $value)) {
            $this->_usedProperties['category'] = true;
            $this->category = new \Symfony\Config\SuluCategory\Objects\CategoryConfig($value['category']);
            unset($value['category']);
        }

        if (array_key_exists('category_meta', $value)) {
            $this->_usedProperties['categoryMeta'] = true;
            $this->categoryMeta = new \Symfony\Config\SuluCategory\Objects\CategoryMetaConfig($value['category_meta']);
            unset($value['category_meta']);
        }

        if (array_key_exists('category_translation', $value)) {
            $this->_usedProperties['categoryTranslation'] = true;
            $this->categoryTranslation = new \Symfony\Config\SuluCategory\Objects\CategoryTranslationConfig($value['category_translation']);
            unset($value['category_translation']);
        }

        if (array_key_exists('keyword', $value)) {
            $this->_usedProperties['keyword'] = true;
            $this->keyword = new \Symfony\Config\SuluCategory\Objects\KeywordConfig($value['keyword']);
            unset($value['keyword']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['category'])) {
            $output['category'] = $this->category->toArray();
        }
        if (isset($this->_usedProperties['categoryMeta'])) {
            $output['category_meta'] = $this->categoryMeta->toArray();
        }
        if (isset($this->_usedProperties['categoryTranslation'])) {
            $output['category_translation'] = $this->categoryTranslation->toArray();
        }
        if (isset($this->_usedProperties['keyword'])) {
            $output['keyword'] = $this->keyword->toArray();
        }

        return $output;
    }

}
