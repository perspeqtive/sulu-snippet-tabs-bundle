<?php

namespace Symfony\Config\DoctrinePhpcr\Odm;

require_once __DIR__.\DIRECTORY_SEPARATOR.'DocumentManagerConfig'.\DIRECTORY_SEPARATOR.'MetadataCacheDriverConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'DocumentManagerConfig'.\DIRECTORY_SEPARATOR.'MappingConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;

/**
 * This class is automatically generated to help in creating a config.
 */
class DocumentManagerConfig 
{
    private $metadataCacheDriver;
    private $session;
    private $configurationId;
    private $classMetadataFactoryName;
    private $autoMapping;
    private $defaultRepositoryClass;
    private $repositoryFactory;
    private $mappings;
    private $_usedProperties = [];

    /**
     * @default {"type":"array"}
    */
    public function metadataCacheDriver(array $value = []): \Symfony\Config\DoctrinePhpcr\Odm\DocumentManagerConfig\MetadataCacheDriverConfig
    {
        if (null === $this->metadataCacheDriver) {
            $this->_usedProperties['metadataCacheDriver'] = true;
            $this->metadataCacheDriver = new \Symfony\Config\DoctrinePhpcr\Odm\DocumentManagerConfig\MetadataCacheDriverConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "metadataCacheDriver()" has already been initialized. You cannot pass values the second time you call metadataCacheDriver().');
        }

        return $this->metadataCacheDriver;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function session($value): static
    {
        $this->_usedProperties['session'] = true;
        $this->session = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function configurationId($value): static
    {
        $this->_usedProperties['configurationId'] = true;
        $this->configurationId = $value;

        return $this;
    }

    /**
     * @default 'Doctrine\\ODM\\PHPCR\\Mapping\\ClassMetadataFactory'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function classMetadataFactoryName($value): static
    {
        $this->_usedProperties['classMetadataFactoryName'] = true;
        $this->classMetadataFactoryName = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function autoMapping($value): static
    {
        $this->_usedProperties['autoMapping'] = true;
        $this->autoMapping = $value;

        return $this;
    }

    /**
     * @default 'Doctrine\\ODM\\PHPCR\\DocumentRepository'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultRepositoryClass($value): static
    {
        $this->_usedProperties['defaultRepositoryClass'] = true;
        $this->defaultRepositoryClass = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function repositoryFactory($value): static
    {
        $this->_usedProperties['repositoryFactory'] = true;
        $this->repositoryFactory = $value;

        return $this;
    }

    /**
     * @template TValue
     * @param TValue $value
     * @return \Symfony\Config\DoctrinePhpcr\Odm\DocumentManagerConfig\MappingConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\DoctrinePhpcr\Odm\DocumentManagerConfig\MappingConfig : static)
     */
    public function mapping(string $name, string|array $value = []): \Symfony\Config\DoctrinePhpcr\Odm\DocumentManagerConfig\MappingConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['mappings'] = true;
            $this->mappings[$name] = $value;

            return $this;
        }

        if (!isset($this->mappings[$name]) || !$this->mappings[$name] instanceof \Symfony\Config\DoctrinePhpcr\Odm\DocumentManagerConfig\MappingConfig) {
            $this->_usedProperties['mappings'] = true;
            $this->mappings[$name] = new \Symfony\Config\DoctrinePhpcr\Odm\DocumentManagerConfig\MappingConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "mapping()" has already been initialized. You cannot pass values the second time you call mapping().');
        }

        return $this->mappings[$name];
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('metadata_cache_driver', $value)) {
            $this->_usedProperties['metadataCacheDriver'] = true;
            $this->metadataCacheDriver = new \Symfony\Config\DoctrinePhpcr\Odm\DocumentManagerConfig\MetadataCacheDriverConfig($value['metadata_cache_driver']);
            unset($value['metadata_cache_driver']);
        }

        if (array_key_exists('session', $value)) {
            $this->_usedProperties['session'] = true;
            $this->session = $value['session'];
            unset($value['session']);
        }

        if (array_key_exists('configuration_id', $value)) {
            $this->_usedProperties['configurationId'] = true;
            $this->configurationId = $value['configuration_id'];
            unset($value['configuration_id']);
        }

        if (array_key_exists('class_metadata_factory_name', $value)) {
            $this->_usedProperties['classMetadataFactoryName'] = true;
            $this->classMetadataFactoryName = $value['class_metadata_factory_name'];
            unset($value['class_metadata_factory_name']);
        }

        if (array_key_exists('auto_mapping', $value)) {
            $this->_usedProperties['autoMapping'] = true;
            $this->autoMapping = $value['auto_mapping'];
            unset($value['auto_mapping']);
        }

        if (array_key_exists('default_repository_class', $value)) {
            $this->_usedProperties['defaultRepositoryClass'] = true;
            $this->defaultRepositoryClass = $value['default_repository_class'];
            unset($value['default_repository_class']);
        }

        if (array_key_exists('repository_factory', $value)) {
            $this->_usedProperties['repositoryFactory'] = true;
            $this->repositoryFactory = $value['repository_factory'];
            unset($value['repository_factory']);
        }

        if (array_key_exists('mappings', $value)) {
            $this->_usedProperties['mappings'] = true;
            $this->mappings = array_map(fn ($v) => \is_array($v) ? new \Symfony\Config\DoctrinePhpcr\Odm\DocumentManagerConfig\MappingConfig($v) : $v, $value['mappings']);
            unset($value['mappings']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['metadataCacheDriver'])) {
            $output['metadata_cache_driver'] = $this->metadataCacheDriver->toArray();
        }
        if (isset($this->_usedProperties['session'])) {
            $output['session'] = $this->session;
        }
        if (isset($this->_usedProperties['configurationId'])) {
            $output['configuration_id'] = $this->configurationId;
        }
        if (isset($this->_usedProperties['classMetadataFactoryName'])) {
            $output['class_metadata_factory_name'] = $this->classMetadataFactoryName;
        }
        if (isset($this->_usedProperties['autoMapping'])) {
            $output['auto_mapping'] = $this->autoMapping;
        }
        if (isset($this->_usedProperties['defaultRepositoryClass'])) {
            $output['default_repository_class'] = $this->defaultRepositoryClass;
        }
        if (isset($this->_usedProperties['repositoryFactory'])) {
            $output['repository_factory'] = $this->repositoryFactory;
        }
        if (isset($this->_usedProperties['mappings'])) {
            $output['mappings'] = array_map(fn ($v) => $v instanceof \Symfony\Config\DoctrinePhpcr\Odm\DocumentManagerConfig\MappingConfig ? $v->toArray() : $v, $this->mappings);
        }

        return $output;
    }

}
