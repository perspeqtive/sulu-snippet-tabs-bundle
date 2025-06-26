<?php

namespace Symfony\Config\SuluMedia;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Storages'.\DIRECTORY_SEPARATOR.'LocalConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class StoragesConfig 
{
    private $local;
    private $_usedProperties = [];

    /**
     * @default {"path":"%kernel.project_dir%\/var\/uploads\/media","segments":10}
    */
    public function local(array $value = []): \Symfony\Config\SuluMedia\Storages\LocalConfig
    {
        if (null === $this->local) {
            $this->_usedProperties['local'] = true;
            $this->local = new \Symfony\Config\SuluMedia\Storages\LocalConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "local()" has already been initialized. You cannot pass values the second time you call local().');
        }

        return $this->local;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('local', $value)) {
            $this->_usedProperties['local'] = true;
            $this->local = new \Symfony\Config\SuluMedia\Storages\LocalConfig($value['local']);
            unset($value['local']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['local'])) {
            $output['local'] = $this->local->toArray();
        }

        return $output;
    }

}
