<?php

namespace Symfony\Config;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class PhpcrMigrationsConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $versionNodeName;
    private $paths;
    private $_usedProperties = [];

    /**
     * @default 'jcr:versions'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function versionNodeName($value): static
    {
        $this->_usedProperties['versionNodeName'] = true;
        $this->versionNodeName = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function paths(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['paths'] = true;
        $this->paths = $value;

        return $this;
    }

    public function getExtensionAlias(): string
    {
        return 'phpcr_migrations';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('version_node_name', $value)) {
            $this->_usedProperties['versionNodeName'] = true;
            $this->versionNodeName = $value['version_node_name'];
            unset($value['version_node_name']);
        }

        if (array_key_exists('paths', $value)) {
            $this->_usedProperties['paths'] = true;
            $this->paths = $value['paths'];
            unset($value['paths']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['versionNodeName'])) {
            $output['version_node_name'] = $this->versionNodeName;
        }
        if (isset($this->_usedProperties['paths'])) {
            $output['paths'] = $this->paths;
        }

        return $output;
    }

}
