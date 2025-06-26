<?php

namespace Symfony\Config\DoctrinePhpcr;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Session'.\DIRECTORY_SEPARATOR.'SessionConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SessionConfig 
{
    private $defaultSession;
    private $sessions;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function defaultSession($value): static
    {
        $this->_usedProperties['defaultSession'] = true;
        $this->defaultSession = $value;

        return $this;
    }

    public function session(string $name, array $value = []): \Symfony\Config\DoctrinePhpcr\Session\SessionConfig
    {
        if (!isset($this->sessions[$name])) {
            $this->_usedProperties['sessions'] = true;
            $this->sessions[$name] = new \Symfony\Config\DoctrinePhpcr\Session\SessionConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "session()" has already been initialized. You cannot pass values the second time you call session().');
        }

        return $this->sessions[$name];
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('default_session', $value)) {
            $this->_usedProperties['defaultSession'] = true;
            $this->defaultSession = $value['default_session'];
            unset($value['default_session']);
        }

        if (array_key_exists('sessions', $value)) {
            $this->_usedProperties['sessions'] = true;
            $this->sessions = array_map(fn ($v) => new \Symfony\Config\DoctrinePhpcr\Session\SessionConfig($v), $value['sessions']);
            unset($value['sessions']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['defaultSession'])) {
            $output['default_session'] = $this->defaultSession;
        }
        if (isset($this->_usedProperties['sessions'])) {
            $output['sessions'] = array_map(fn ($v) => $v->toArray(), $this->sessions);
        }

        return $output;
    }

}
