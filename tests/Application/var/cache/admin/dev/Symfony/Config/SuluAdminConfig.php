<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluAdmin'.\DIRECTORY_SEPARATOR.'ResourcesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluAdmin'.\DIRECTORY_SEPARATOR.'CollaborationConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluAdmin'.\DIRECTORY_SEPARATOR.'FormsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluAdmin'.\DIRECTORY_SEPARATOR.'ListsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluAdmin'.\DIRECTORY_SEPARATOR.'FieldTypeOptionsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SuluAdminConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $name;
    private $email;
    private $userDataService;
    private $resources;
    private $collaboration;
    private $forms;
    private $lists;
    private $iconSets;
    private $fieldTypeOptions;
    private $_usedProperties = [];

    /**
     * @default 'Sulu Admin'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function name($value): static
    {
        $this->_usedProperties['name'] = true;
        $this->name = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function email($value): static
    {
        $this->_usedProperties['email'] = true;
        $this->email = $value;

        return $this;
    }

    /**
     * @default 'sulu_security.user_manager'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function userDataService($value): static
    {
        $this->_usedProperties['userDataService'] = true;
        $this->userDataService = $value;

        return $this;
    }

    public function resources(string $resourceKey, array $value = []): \Symfony\Config\SuluAdmin\ResourcesConfig
    {
        if (!isset($this->resources[$resourceKey])) {
            $this->_usedProperties['resources'] = true;
            $this->resources[$resourceKey] = new \Symfony\Config\SuluAdmin\ResourcesConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "resources()" has already been initialized. You cannot pass values the second time you call resources().');
        }

        return $this->resources[$resourceKey];
    }

    /**
     * @default {"enabled":false,"interval":20,"threshold":60}
    */
    public function collaboration(array $value = []): \Symfony\Config\SuluAdmin\CollaborationConfig
    {
        if (null === $this->collaboration) {
            $this->_usedProperties['collaboration'] = true;
            $this->collaboration = new \Symfony\Config\SuluAdmin\CollaborationConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "collaboration()" has already been initialized. You cannot pass values the second time you call collaboration().');
        }

        return $this->collaboration;
    }

    public function forms(array $value = []): \Symfony\Config\SuluAdmin\FormsConfig
    {
        if (null === $this->forms) {
            $this->_usedProperties['forms'] = true;
            $this->forms = new \Symfony\Config\SuluAdmin\FormsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "forms()" has already been initialized. You cannot pass values the second time you call forms().');
        }

        return $this->forms;
    }

    public function lists(array $value = []): \Symfony\Config\SuluAdmin\ListsConfig
    {
        if (null === $this->lists) {
            $this->_usedProperties['lists'] = true;
            $this->lists = new \Symfony\Config\SuluAdmin\ListsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "lists()" has already been initialized. You cannot pass values the second time you call lists().');
        }

        return $this->lists;
    }

    /**
     * @return $this
     */
    public function iconSets(string $name, mixed $value): static
    {
        $this->_usedProperties['iconSets'] = true;
        $this->iconSets[$name] = $value;

        return $this;
    }

    public function fieldTypeOptions(array $value = []): \Symfony\Config\SuluAdmin\FieldTypeOptionsConfig
    {
        if (null === $this->fieldTypeOptions) {
            $this->_usedProperties['fieldTypeOptions'] = true;
            $this->fieldTypeOptions = new \Symfony\Config\SuluAdmin\FieldTypeOptionsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "fieldTypeOptions()" has already been initialized. You cannot pass values the second time you call fieldTypeOptions().');
        }

        return $this->fieldTypeOptions;
    }

    public function getExtensionAlias(): string
    {
        return 'sulu_admin';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('name', $value)) {
            $this->_usedProperties['name'] = true;
            $this->name = $value['name'];
            unset($value['name']);
        }

        if (array_key_exists('email', $value)) {
            $this->_usedProperties['email'] = true;
            $this->email = $value['email'];
            unset($value['email']);
        }

        if (array_key_exists('user_data_service', $value)) {
            $this->_usedProperties['userDataService'] = true;
            $this->userDataService = $value['user_data_service'];
            unset($value['user_data_service']);
        }

        if (array_key_exists('resources', $value)) {
            $this->_usedProperties['resources'] = true;
            $this->resources = array_map(fn ($v) => new \Symfony\Config\SuluAdmin\ResourcesConfig($v), $value['resources']);
            unset($value['resources']);
        }

        if (array_key_exists('collaboration', $value)) {
            $this->_usedProperties['collaboration'] = true;
            $this->collaboration = new \Symfony\Config\SuluAdmin\CollaborationConfig($value['collaboration']);
            unset($value['collaboration']);
        }

        if (array_key_exists('forms', $value)) {
            $this->_usedProperties['forms'] = true;
            $this->forms = new \Symfony\Config\SuluAdmin\FormsConfig($value['forms']);
            unset($value['forms']);
        }

        if (array_key_exists('lists', $value)) {
            $this->_usedProperties['lists'] = true;
            $this->lists = new \Symfony\Config\SuluAdmin\ListsConfig($value['lists']);
            unset($value['lists']);
        }

        if (array_key_exists('icon_sets', $value)) {
            $this->_usedProperties['iconSets'] = true;
            $this->iconSets = $value['icon_sets'];
            unset($value['icon_sets']);
        }

        if (array_key_exists('field_type_options', $value)) {
            $this->_usedProperties['fieldTypeOptions'] = true;
            $this->fieldTypeOptions = new \Symfony\Config\SuluAdmin\FieldTypeOptionsConfig($value['field_type_options']);
            unset($value['field_type_options']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['name'])) {
            $output['name'] = $this->name;
        }
        if (isset($this->_usedProperties['email'])) {
            $output['email'] = $this->email;
        }
        if (isset($this->_usedProperties['userDataService'])) {
            $output['user_data_service'] = $this->userDataService;
        }
        if (isset($this->_usedProperties['resources'])) {
            $output['resources'] = array_map(fn ($v) => $v->toArray(), $this->resources);
        }
        if (isset($this->_usedProperties['collaboration'])) {
            $output['collaboration'] = $this->collaboration->toArray();
        }
        if (isset($this->_usedProperties['forms'])) {
            $output['forms'] = $this->forms->toArray();
        }
        if (isset($this->_usedProperties['lists'])) {
            $output['lists'] = $this->lists->toArray();
        }
        if (isset($this->_usedProperties['iconSets'])) {
            $output['icon_sets'] = $this->iconSets;
        }
        if (isset($this->_usedProperties['fieldTypeOptions'])) {
            $output['field_type_options'] = $this->fieldTypeOptions->toArray();
        }

        return $output;
    }

}
