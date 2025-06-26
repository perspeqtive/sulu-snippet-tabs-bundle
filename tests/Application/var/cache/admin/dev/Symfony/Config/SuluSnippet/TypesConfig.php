<?php

namespace Symfony\Config\SuluSnippet;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Types'.\DIRECTORY_SEPARATOR.'SnippetConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class TypesConfig 
{
    private $snippet;
    private $_usedProperties = [];

    /**
     * @default {"default_enabled":true}
    */
    public function snippet(array $value = []): \Symfony\Config\SuluSnippet\Types\SnippetConfig
    {
        if (null === $this->snippet) {
            $this->_usedProperties['snippet'] = true;
            $this->snippet = new \Symfony\Config\SuluSnippet\Types\SnippetConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "snippet()" has already been initialized. You cannot pass values the second time you call snippet().');
        }

        return $this->snippet;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('snippet', $value)) {
            $this->_usedProperties['snippet'] = true;
            $this->snippet = new \Symfony\Config\SuluSnippet\Types\SnippetConfig($value['snippet']);
            unset($value['snippet']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['snippet'])) {
            $output['snippet'] = $this->snippet->toArray();
        }

        return $output;
    }

}
