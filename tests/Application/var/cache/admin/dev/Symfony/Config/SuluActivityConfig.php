<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluActivity'.\DIRECTORY_SEPARATOR.'StorageConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluActivity'.\DIRECTORY_SEPARATOR.'ObjectsConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SuluActivityConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $storage;
    private $objects;
    private $_usedProperties = [];

    /**
     * @default {"adapter":"doctrine","persist_payload":false}
    */
    public function storage(array $value = []): \Symfony\Config\SuluActivity\StorageConfig
    {
        if (null === $this->storage) {
            $this->_usedProperties['storage'] = true;
            $this->storage = new \Symfony\Config\SuluActivity\StorageConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "storage()" has already been initialized. You cannot pass values the second time you call storage().');
        }

        return $this->storage;
    }

    /**
     * @default {"activity":{"model":"Sulu\\Bundle\\ActivityBundle\\Domain\\Model\\Activity"}}
    */
    public function objects(array $value = []): \Symfony\Config\SuluActivity\ObjectsConfig
    {
        if (null === $this->objects) {
            $this->_usedProperties['objects'] = true;
            $this->objects = new \Symfony\Config\SuluActivity\ObjectsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "objects()" has already been initialized. You cannot pass values the second time you call objects().');
        }

        return $this->objects;
    }

    public function getExtensionAlias(): string
    {
        return 'sulu_activity';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('storage', $value)) {
            $this->_usedProperties['storage'] = true;
            $this->storage = new \Symfony\Config\SuluActivity\StorageConfig($value['storage']);
            unset($value['storage']);
        }

        if (array_key_exists('objects', $value)) {
            $this->_usedProperties['objects'] = true;
            $this->objects = new \Symfony\Config\SuluActivity\ObjectsConfig($value['objects']);
            unset($value['objects']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['storage'])) {
            $output['storage'] = $this->storage->toArray();
        }
        if (isset($this->_usedProperties['objects'])) {
            $output['objects'] = $this->objects->toArray();
        }

        return $output;
    }

}
