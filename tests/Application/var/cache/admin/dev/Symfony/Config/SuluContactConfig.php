<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluContact'.\DIRECTORY_SEPARATOR.'DefaultsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluContact'.\DIRECTORY_SEPARATOR.'FormConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluContact'.\DIRECTORY_SEPARATOR.'FormOfAddressConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluContact'.\DIRECTORY_SEPARATOR.'ObjectsConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SuluContactConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $defaults;
    private $form;
    private $formOfAddress;
    private $objects;
    private $_usedProperties = [];

    /**
     * @default {"phoneType":"1","phoneTypeMobile":"3","phoneTypeIsdn":"1","emailType":"1","addressType":"1","urlType":"1","faxType":"1","socialMediaProfileType":"1","country":"AT"}
    */
    public function defaults(array $value = []): \Symfony\Config\SuluContact\DefaultsConfig
    {
        if (null === $this->defaults) {
            $this->_usedProperties['defaults'] = true;
            $this->defaults = new \Symfony\Config\SuluContact\DefaultsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "defaults()" has already been initialized. You cannot pass values the second time you call defaults().');
        }

        return $this->defaults;
    }

    /**
     * @default {"contact":{"category_root":null},"account":{"category_root":null}}
    */
    public function form(array $value = []): \Symfony\Config\SuluContact\FormConfig
    {
        if (null === $this->form) {
            $this->_usedProperties['form'] = true;
            $this->form = new \Symfony\Config\SuluContact\FormConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "form()" has already been initialized. You cannot pass values the second time you call form().');
        }

        return $this->form;
    }

    /**
     * @default {"male":{"id":0,"name":"male","translation":"contact.contacts.formOfAddress.male"},"female":{"id":1,"name":"female","translation":"contact.contacts.formOfAddress.female"}}
    */
    public function formOfAddress(string $title, array $value = []): \Symfony\Config\SuluContact\FormOfAddressConfig
    {
        if (!isset($this->formOfAddress[$title])) {
            $this->_usedProperties['formOfAddress'] = true;
            $this->formOfAddress[$title] = new \Symfony\Config\SuluContact\FormOfAddressConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "formOfAddress()" has already been initialized. You cannot pass values the second time you call formOfAddress().');
        }

        return $this->formOfAddress[$title];
    }

    /**
     * @default {"contact":{"model":"Sulu\\Bundle\\ContactBundle\\Entity\\Contact","repository":"Sulu\\Bundle\\ContactBundle\\Entity\\ContactRepository"},"account":{"model":"Sulu\\Bundle\\ContactBundle\\Entity\\Account","repository":"Sulu\\Bundle\\ContactBundle\\Entity\\AccountRepository"}}
    */
    public function objects(array $value = []): \Symfony\Config\SuluContact\ObjectsConfig
    {
        if (null === $this->objects) {
            $this->_usedProperties['objects'] = true;
            $this->objects = new \Symfony\Config\SuluContact\ObjectsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "objects()" has already been initialized. You cannot pass values the second time you call objects().');
        }

        return $this->objects;
    }

    public function getExtensionAlias(): string
    {
        return 'sulu_contact';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('defaults', $value)) {
            $this->_usedProperties['defaults'] = true;
            $this->defaults = new \Symfony\Config\SuluContact\DefaultsConfig($value['defaults']);
            unset($value['defaults']);
        }

        if (array_key_exists('form', $value)) {
            $this->_usedProperties['form'] = true;
            $this->form = new \Symfony\Config\SuluContact\FormConfig($value['form']);
            unset($value['form']);
        }

        if (array_key_exists('form_of_address', $value)) {
            $this->_usedProperties['formOfAddress'] = true;
            $this->formOfAddress = array_map(fn ($v) => new \Symfony\Config\SuluContact\FormOfAddressConfig($v), $value['form_of_address']);
            unset($value['form_of_address']);
        }

        if (array_key_exists('objects', $value)) {
            $this->_usedProperties['objects'] = true;
            $this->objects = new \Symfony\Config\SuluContact\ObjectsConfig($value['objects']);
            unset($value['objects']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['defaults'])) {
            $output['defaults'] = $this->defaults->toArray();
        }
        if (isset($this->_usedProperties['form'])) {
            $output['form'] = $this->form->toArray();
        }
        if (isset($this->_usedProperties['formOfAddress'])) {
            $output['form_of_address'] = array_map(fn ($v) => $v->toArray(), $this->formOfAddress);
        }
        if (isset($this->_usedProperties['objects'])) {
            $output['objects'] = $this->objects->toArray();
        }

        return $output;
    }

}
