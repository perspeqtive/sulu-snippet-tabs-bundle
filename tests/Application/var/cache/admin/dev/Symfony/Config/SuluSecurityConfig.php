<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluSecurity'.\DIRECTORY_SEPARATOR.'CheckerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluSecurity'.\DIRECTORY_SEPARATOR.'SecurityTypesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluSecurity'.\DIRECTORY_SEPARATOR.'PasswordPolicyConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluSecurity'.\DIRECTORY_SEPARATOR.'SingleSignOnConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluSecurity'.\DIRECTORY_SEPARATOR.'TwoFactorConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluSecurity'.\DIRECTORY_SEPARATOR.'ResetPasswordConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluSecurity'.\DIRECTORY_SEPARATOR.'ObjectsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SuluSecurityConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $system;
    private $checker;
    private $securityTypes;
    private $passwordPolicy;
    private $singleSignOn;
    private $twoFactor;
    private $resetPassword;
    private $objects;
    private $_usedProperties = [];

    /**
     * @default 'Sulu'
     * @param ParamConfigurator|mixed $value
     * @deprecated The system option is deprecated and will be removed. Setting this option in the admin context will break the permissions registered by the bundles.
     * @return $this
     */
    public function system($value): static
    {
        $this->_usedProperties['system'] = true;
        $this->system = $value;

        return $this;
    }

    /**
     * @template TValue
     * @param TValue $value
     * @default {"enabled":false}
     * @return \Symfony\Config\SuluSecurity\CheckerConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\SuluSecurity\CheckerConfig : static)
     */
    public function checker(array $value = []): \Symfony\Config\SuluSecurity\CheckerConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['checker'] = true;
            $this->checker = $value;

            return $this;
        }

        if (!$this->checker instanceof \Symfony\Config\SuluSecurity\CheckerConfig) {
            $this->_usedProperties['checker'] = true;
            $this->checker = new \Symfony\Config\SuluSecurity\CheckerConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "checker()" has already been initialized. You cannot pass values the second time you call checker().');
        }

        return $this->checker;
    }

    /**
     * @default {"fixture":"\/var\/www\/html\/vendor\/sulu\/sulu\/src\/Sulu\/Bundle\/SecurityBundle\/DependencyInjection\/..\/DataFixtures\/security-types.xml"}
    */
    public function securityTypes(array $value = []): \Symfony\Config\SuluSecurity\SecurityTypesConfig
    {
        if (null === $this->securityTypes) {
            $this->_usedProperties['securityTypes'] = true;
            $this->securityTypes = new \Symfony\Config\SuluSecurity\SecurityTypesConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "securityTypes()" has already been initialized. You cannot pass values the second time you call securityTypes().');
        }

        return $this->securityTypes;
    }

    /**
     * @template TValue
     * @param TValue $value
     * @default {"enabled":false,"pattern":".{8,}","info_translation_key":"sulu_security.password_policy_information"}
     * @return \Symfony\Config\SuluSecurity\PasswordPolicyConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\SuluSecurity\PasswordPolicyConfig : static)
     */
    public function passwordPolicy(array $value = []): \Symfony\Config\SuluSecurity\PasswordPolicyConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['passwordPolicy'] = true;
            $this->passwordPolicy = $value;

            return $this;
        }

        if (!$this->passwordPolicy instanceof \Symfony\Config\SuluSecurity\PasswordPolicyConfig) {
            $this->_usedProperties['passwordPolicy'] = true;
            $this->passwordPolicy = new \Symfony\Config\SuluSecurity\PasswordPolicyConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "passwordPolicy()" has already been initialized. You cannot pass values the second time you call passwordPolicy().');
        }

        return $this->passwordPolicy;
    }

    public function singleSignOn(array $value = []): \Symfony\Config\SuluSecurity\SingleSignOnConfig
    {
        if (null === $this->singleSignOn) {
            $this->_usedProperties['singleSignOn'] = true;
            $this->singleSignOn = new \Symfony\Config\SuluSecurity\SingleSignOnConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "singleSignOn()" has already been initialized. You cannot pass values the second time you call singleSignOn().');
        }

        return $this->singleSignOn;
    }

    /**
     * @default {"email":{"template":"@SuluSecurity\/mail_templates\/two_factor"},"force":{"enabled":false,"pattern":"(.+)"}}
    */
    public function twoFactor(array $value = []): \Symfony\Config\SuluSecurity\TwoFactorConfig
    {
        if (null === $this->twoFactor) {
            $this->_usedProperties['twoFactor'] = true;
            $this->twoFactor = new \Symfony\Config\SuluSecurity\TwoFactorConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "twoFactor()" has already been initialized. You cannot pass values the second time you call twoFactor().');
        }

        return $this->twoFactor;
    }

    /**
     * @default {"mail":{"token_send_limit":3,"sender":"","subject":"sulu_security.reset_mail_subject","template":"@SuluSecurity\/mail_templates\/reset_password.html.twig","translation_domain":"admin"}}
    */
    public function resetPassword(array $value = []): \Symfony\Config\SuluSecurity\ResetPasswordConfig
    {
        if (null === $this->resetPassword) {
            $this->_usedProperties['resetPassword'] = true;
            $this->resetPassword = new \Symfony\Config\SuluSecurity\ResetPasswordConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "resetPassword()" has already been initialized. You cannot pass values the second time you call resetPassword().');
        }

        return $this->resetPassword;
    }

    /**
     * @default {"user":{"model":"Sulu\\Bundle\\SecurityBundle\\Entity\\User","repository":"Sulu\\Bundle\\SecurityBundle\\Entity\\UserRepository"},"role":{"model":"Sulu\\Bundle\\SecurityBundle\\Entity\\Role","repository":"Sulu\\Bundle\\SecurityBundle\\Entity\\RoleRepository"},"role_setting":{"model":"Sulu\\Bundle\\SecurityBundle\\Entity\\RoleSetting","repository":"Sulu\\Bundle\\SecurityBundle\\Entity\\RoleSettingRepository"},"access_control":{"model":"Sulu\\Bundle\\SecurityBundle\\Entity\\AccessControl","repository":"Sulu\\Bundle\\SecurityBundle\\Entity\\AccessControlRepository"}}
    */
    public function objects(array $value = []): \Symfony\Config\SuluSecurity\ObjectsConfig
    {
        if (null === $this->objects) {
            $this->_usedProperties['objects'] = true;
            $this->objects = new \Symfony\Config\SuluSecurity\ObjectsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "objects()" has already been initialized. You cannot pass values the second time you call objects().');
        }

        return $this->objects;
    }

    public function getExtensionAlias(): string
    {
        return 'sulu_security';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('system', $value)) {
            $this->_usedProperties['system'] = true;
            $this->system = $value['system'];
            unset($value['system']);
        }

        if (array_key_exists('checker', $value)) {
            $this->_usedProperties['checker'] = true;
            $this->checker = \is_array($value['checker']) ? new \Symfony\Config\SuluSecurity\CheckerConfig($value['checker']) : $value['checker'];
            unset($value['checker']);
        }

        if (array_key_exists('security_types', $value)) {
            $this->_usedProperties['securityTypes'] = true;
            $this->securityTypes = new \Symfony\Config\SuluSecurity\SecurityTypesConfig($value['security_types']);
            unset($value['security_types']);
        }

        if (array_key_exists('password_policy', $value)) {
            $this->_usedProperties['passwordPolicy'] = true;
            $this->passwordPolicy = \is_array($value['password_policy']) ? new \Symfony\Config\SuluSecurity\PasswordPolicyConfig($value['password_policy']) : $value['password_policy'];
            unset($value['password_policy']);
        }

        if (array_key_exists('single_sign_on', $value)) {
            $this->_usedProperties['singleSignOn'] = true;
            $this->singleSignOn = new \Symfony\Config\SuluSecurity\SingleSignOnConfig($value['single_sign_on']);
            unset($value['single_sign_on']);
        }

        if (array_key_exists('two_factor', $value)) {
            $this->_usedProperties['twoFactor'] = true;
            $this->twoFactor = new \Symfony\Config\SuluSecurity\TwoFactorConfig($value['two_factor']);
            unset($value['two_factor']);
        }

        if (array_key_exists('reset_password', $value)) {
            $this->_usedProperties['resetPassword'] = true;
            $this->resetPassword = new \Symfony\Config\SuluSecurity\ResetPasswordConfig($value['reset_password']);
            unset($value['reset_password']);
        }

        if (array_key_exists('objects', $value)) {
            $this->_usedProperties['objects'] = true;
            $this->objects = new \Symfony\Config\SuluSecurity\ObjectsConfig($value['objects']);
            unset($value['objects']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['system'])) {
            $output['system'] = $this->system;
        }
        if (isset($this->_usedProperties['checker'])) {
            $output['checker'] = $this->checker instanceof \Symfony\Config\SuluSecurity\CheckerConfig ? $this->checker->toArray() : $this->checker;
        }
        if (isset($this->_usedProperties['securityTypes'])) {
            $output['security_types'] = $this->securityTypes->toArray();
        }
        if (isset($this->_usedProperties['passwordPolicy'])) {
            $output['password_policy'] = $this->passwordPolicy instanceof \Symfony\Config\SuluSecurity\PasswordPolicyConfig ? $this->passwordPolicy->toArray() : $this->passwordPolicy;
        }
        if (isset($this->_usedProperties['singleSignOn'])) {
            $output['single_sign_on'] = $this->singleSignOn->toArray();
        }
        if (isset($this->_usedProperties['twoFactor'])) {
            $output['two_factor'] = $this->twoFactor->toArray();
        }
        if (isset($this->_usedProperties['resetPassword'])) {
            $output['reset_password'] = $this->resetPassword->toArray();
        }
        if (isset($this->_usedProperties['objects'])) {
            $output['objects'] = $this->objects->toArray();
        }

        return $output;
    }

}
