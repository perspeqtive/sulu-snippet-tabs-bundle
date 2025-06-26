<?php

namespace Symfony\Config\DoctrinePhpcr\Odm;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Namespaces'.\DIRECTORY_SEPARATOR.'TranslationConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class NamespacesConfig 
{
    private $translation;
    private $_usedProperties = [];

    /**
     * @default {"alias":null}
    */
    public function translation(array $value = []): \Symfony\Config\DoctrinePhpcr\Odm\Namespaces\TranslationConfig
    {
        if (null === $this->translation) {
            $this->_usedProperties['translation'] = true;
            $this->translation = new \Symfony\Config\DoctrinePhpcr\Odm\Namespaces\TranslationConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "translation()" has already been initialized. You cannot pass values the second time you call translation().');
        }

        return $this->translation;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('translation', $value)) {
            $this->_usedProperties['translation'] = true;
            $this->translation = new \Symfony\Config\DoctrinePhpcr\Odm\Namespaces\TranslationConfig($value['translation']);
            unset($value['translation']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['translation'])) {
            $output['translation'] = $this->translation->toArray();
        }

        return $output;
    }

}
