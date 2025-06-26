<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'DoctrinePhpcr'.\DIRECTORY_SEPARATOR.'SessionConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'DoctrinePhpcr'.\DIRECTORY_SEPARATOR.'OdmConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class DoctrinePhpcrConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $jackrabbitJar;
    private $workspaceDir;
    private $dumpMaxLineLength;
    private $managerRegistryServiceId;
    private $session;
    private $odm;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function jackrabbitJar($value): static
    {
        $this->_usedProperties['jackrabbitJar'] = true;
        $this->jackrabbitJar = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function workspaceDir($value): static
    {
        $this->_usedProperties['workspaceDir'] = true;
        $this->workspaceDir = $value;

        return $this;
    }

    /**
     * @default 120
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function dumpMaxLineLength($value): static
    {
        $this->_usedProperties['dumpMaxLineLength'] = true;
        $this->dumpMaxLineLength = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function managerRegistryServiceId($value): static
    {
        $this->_usedProperties['managerRegistryServiceId'] = true;
        $this->managerRegistryServiceId = $value;

        return $this;
    }

    /**
     * @template TValue
     * @param TValue $value
     * @return \Symfony\Config\DoctrinePhpcr\SessionConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\DoctrinePhpcr\SessionConfig : static)
     */
    public function session(mixed $value = []): \Symfony\Config\DoctrinePhpcr\SessionConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['session'] = true;
            $this->session = $value;

            return $this;
        }

        if (!$this->session instanceof \Symfony\Config\DoctrinePhpcr\SessionConfig) {
            $this->_usedProperties['session'] = true;
            $this->session = new \Symfony\Config\DoctrinePhpcr\SessionConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "session()" has already been initialized. You cannot pass values the second time you call session().');
        }

        return $this->session;
    }

    /**
     * @template TValue
     * @param TValue $value
     * @return \Symfony\Config\DoctrinePhpcr\OdmConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\DoctrinePhpcr\OdmConfig : static)
     */
    public function odm(mixed $value = []): \Symfony\Config\DoctrinePhpcr\OdmConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['odm'] = true;
            $this->odm = $value;

            return $this;
        }

        if (!$this->odm instanceof \Symfony\Config\DoctrinePhpcr\OdmConfig) {
            $this->_usedProperties['odm'] = true;
            $this->odm = new \Symfony\Config\DoctrinePhpcr\OdmConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "odm()" has already been initialized. You cannot pass values the second time you call odm().');
        }

        return $this->odm;
    }

    public function getExtensionAlias(): string
    {
        return 'doctrine_phpcr';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('jackrabbit_jar', $value)) {
            $this->_usedProperties['jackrabbitJar'] = true;
            $this->jackrabbitJar = $value['jackrabbit_jar'];
            unset($value['jackrabbit_jar']);
        }

        if (array_key_exists('workspace_dir', $value)) {
            $this->_usedProperties['workspaceDir'] = true;
            $this->workspaceDir = $value['workspace_dir'];
            unset($value['workspace_dir']);
        }

        if (array_key_exists('dump_max_line_length', $value)) {
            $this->_usedProperties['dumpMaxLineLength'] = true;
            $this->dumpMaxLineLength = $value['dump_max_line_length'];
            unset($value['dump_max_line_length']);
        }

        if (array_key_exists('manager_registry_service_id', $value)) {
            $this->_usedProperties['managerRegistryServiceId'] = true;
            $this->managerRegistryServiceId = $value['manager_registry_service_id'];
            unset($value['manager_registry_service_id']);
        }

        if (array_key_exists('session', $value)) {
            $this->_usedProperties['session'] = true;
            $this->session = \is_array($value['session']) ? new \Symfony\Config\DoctrinePhpcr\SessionConfig($value['session']) : $value['session'];
            unset($value['session']);
        }

        if (array_key_exists('odm', $value)) {
            $this->_usedProperties['odm'] = true;
            $this->odm = \is_array($value['odm']) ? new \Symfony\Config\DoctrinePhpcr\OdmConfig($value['odm']) : $value['odm'];
            unset($value['odm']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['jackrabbitJar'])) {
            $output['jackrabbit_jar'] = $this->jackrabbitJar;
        }
        if (isset($this->_usedProperties['workspaceDir'])) {
            $output['workspace_dir'] = $this->workspaceDir;
        }
        if (isset($this->_usedProperties['dumpMaxLineLength'])) {
            $output['dump_max_line_length'] = $this->dumpMaxLineLength;
        }
        if (isset($this->_usedProperties['managerRegistryServiceId'])) {
            $output['manager_registry_service_id'] = $this->managerRegistryServiceId;
        }
        if (isset($this->_usedProperties['session'])) {
            $output['session'] = $this->session instanceof \Symfony\Config\DoctrinePhpcr\SessionConfig ? $this->session->toArray() : $this->session;
        }
        if (isset($this->_usedProperties['odm'])) {
            $output['odm'] = $this->odm instanceof \Symfony\Config\DoctrinePhpcr\OdmConfig ? $this->odm->toArray() : $this->odm;
        }

        return $output;
    }

}
