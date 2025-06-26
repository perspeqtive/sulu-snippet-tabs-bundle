<?php

namespace Symfony\Config\MassiveSearch;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Persistence'.\DIRECTORY_SEPARATOR.'DoctrineOrmConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class PersistenceConfig 
{
    private $doctrineOrm;
    private $_usedProperties = [];

    /**
     * @template TValue
     * @param TValue $value
     * @default {"enabled":false}
     * @return \Symfony\Config\MassiveSearch\Persistence\DoctrineOrmConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\MassiveSearch\Persistence\DoctrineOrmConfig : static)
     */
    public function doctrineOrm(array $value = []): \Symfony\Config\MassiveSearch\Persistence\DoctrineOrmConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['doctrineOrm'] = true;
            $this->doctrineOrm = $value;

            return $this;
        }

        if (!$this->doctrineOrm instanceof \Symfony\Config\MassiveSearch\Persistence\DoctrineOrmConfig) {
            $this->_usedProperties['doctrineOrm'] = true;
            $this->doctrineOrm = new \Symfony\Config\MassiveSearch\Persistence\DoctrineOrmConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "doctrineOrm()" has already been initialized. You cannot pass values the second time you call doctrineOrm().');
        }

        return $this->doctrineOrm;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('doctrine_orm', $value)) {
            $this->_usedProperties['doctrineOrm'] = true;
            $this->doctrineOrm = \is_array($value['doctrine_orm']) ? new \Symfony\Config\MassiveSearch\Persistence\DoctrineOrmConfig($value['doctrine_orm']) : $value['doctrine_orm'];
            unset($value['doctrine_orm']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['doctrineOrm'])) {
            $output['doctrine_orm'] = $this->doctrineOrm instanceof \Symfony\Config\MassiveSearch\Persistence\DoctrineOrmConfig ? $this->doctrineOrm->toArray() : $this->doctrineOrm;
        }

        return $output;
    }

}
