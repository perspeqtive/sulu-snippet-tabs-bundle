<?php

namespace Symfony\Config;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SuluTestConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $enableTestUserProvider;
    private $_usedProperties = [];

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enableTestUserProvider($value): static
    {
        $this->_usedProperties['enableTestUserProvider'] = true;
        $this->enableTestUserProvider = $value;

        return $this;
    }

    public function getExtensionAlias(): string
    {
        return 'sulu_test';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enable_test_user_provider', $value)) {
            $this->_usedProperties['enableTestUserProvider'] = true;
            $this->enableTestUserProvider = $value['enable_test_user_provider'];
            unset($value['enable_test_user_provider']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['enableTestUserProvider'])) {
            $output['enable_test_user_provider'] = $this->enableTestUserProvider;
        }

        return $output;
    }

}
