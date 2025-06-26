<?php

namespace Symfony\Config\FosHttpCache;

require_once __DIR__.\DIRECTORY_SEPARATOR.'UserContext'.\DIRECTORY_SEPARATOR.'MatchConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'UserContext'.\DIRECTORY_SEPARATOR.'LogoutHandlerConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class UserContextConfig 
{
    private $enabled;
    private $match;
    private $hashCacheTtl;
    private $alwaysVaryOnContextHash;
    private $userIdentifierHeaders;
    private $sessionNamePrefix;
    private $userHashHeader;
    private $roleProvider;
    private $logoutHandler;
    private $_usedProperties = [];

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): static
    {
        $this->_usedProperties['enabled'] = true;
        $this->enabled = $value;

        return $this;
    }

    /**
     * @default {"matcher_service":"fos_http_cache.user_context.request_matcher","accept":"application\/vnd.fos.user-context-hash","method":null}
    */
    public function match(array $value = []): \Symfony\Config\FosHttpCache\UserContext\MatchConfig
    {
        if (null === $this->match) {
            $this->_usedProperties['match'] = true;
            $this->match = new \Symfony\Config\FosHttpCache\UserContext\MatchConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "match()" has already been initialized. You cannot pass values the second time you call match().');
        }

        return $this->match;
    }

    /**
     * Cache the response for the hash for the specified number of seconds. Setting this to 0 will not cache those responses at all.
     * @default 0
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function hashCacheTtl($value): static
    {
        $this->_usedProperties['hashCacheTtl'] = true;
        $this->hashCacheTtl = $value;

        return $this;
    }

    /**
     * Whether to always add the user context hash header name in the response Vary header.
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function alwaysVaryOnContextHash($value): static
    {
        $this->_usedProperties['alwaysVaryOnContextHash'] = true;
        $this->alwaysVaryOnContextHash = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function userIdentifierHeaders(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['userIdentifierHeaders'] = true;
        $this->userIdentifierHeaders = $value;

        return $this;
    }

    /**
     * Prefix for session cookies. Must match your PHP session configuration. Set to false to ignore the session in user context.
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function sessionNamePrefix($value): static
    {
        $this->_usedProperties['sessionNamePrefix'] = true;
        $this->sessionNamePrefix = $value;

        return $this;
    }

    /**
     * Name of the header that contains the hash information for the context.
     * @default 'X-User-Context-Hash'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function userHashHeader($value): static
    {
        $this->_usedProperties['userHashHeader'] = true;
        $this->userHashHeader = $value;

        return $this;
    }

    /**
     * Whether to enable a provider that automatically adds all roles of the current user to the context.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function roleProvider($value): static
    {
        $this->_usedProperties['roleProvider'] = true;
        $this->roleProvider = $value;

        return $this;
    }

    /**
     * @template TValue
     * @param TValue $value
     * @default {"enabled":"auto"}
     * @return \Symfony\Config\FosHttpCache\UserContext\LogoutHandlerConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\FosHttpCache\UserContext\LogoutHandlerConfig : static)
     */
    public function logoutHandler(array $value = []): \Symfony\Config\FosHttpCache\UserContext\LogoutHandlerConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['logoutHandler'] = true;
            $this->logoutHandler = $value;

            return $this;
        }

        if (!$this->logoutHandler instanceof \Symfony\Config\FosHttpCache\UserContext\LogoutHandlerConfig) {
            $this->_usedProperties['logoutHandler'] = true;
            $this->logoutHandler = new \Symfony\Config\FosHttpCache\UserContext\LogoutHandlerConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "logoutHandler()" has already been initialized. You cannot pass values the second time you call logoutHandler().');
        }

        return $this->logoutHandler;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('match', $value)) {
            $this->_usedProperties['match'] = true;
            $this->match = new \Symfony\Config\FosHttpCache\UserContext\MatchConfig($value['match']);
            unset($value['match']);
        }

        if (array_key_exists('hash_cache_ttl', $value)) {
            $this->_usedProperties['hashCacheTtl'] = true;
            $this->hashCacheTtl = $value['hash_cache_ttl'];
            unset($value['hash_cache_ttl']);
        }

        if (array_key_exists('always_vary_on_context_hash', $value)) {
            $this->_usedProperties['alwaysVaryOnContextHash'] = true;
            $this->alwaysVaryOnContextHash = $value['always_vary_on_context_hash'];
            unset($value['always_vary_on_context_hash']);
        }

        if (array_key_exists('user_identifier_headers', $value)) {
            $this->_usedProperties['userIdentifierHeaders'] = true;
            $this->userIdentifierHeaders = $value['user_identifier_headers'];
            unset($value['user_identifier_headers']);
        }

        if (array_key_exists('session_name_prefix', $value)) {
            $this->_usedProperties['sessionNamePrefix'] = true;
            $this->sessionNamePrefix = $value['session_name_prefix'];
            unset($value['session_name_prefix']);
        }

        if (array_key_exists('user_hash_header', $value)) {
            $this->_usedProperties['userHashHeader'] = true;
            $this->userHashHeader = $value['user_hash_header'];
            unset($value['user_hash_header']);
        }

        if (array_key_exists('role_provider', $value)) {
            $this->_usedProperties['roleProvider'] = true;
            $this->roleProvider = $value['role_provider'];
            unset($value['role_provider']);
        }

        if (array_key_exists('logout_handler', $value)) {
            $this->_usedProperties['logoutHandler'] = true;
            $this->logoutHandler = \is_array($value['logout_handler']) ? new \Symfony\Config\FosHttpCache\UserContext\LogoutHandlerConfig($value['logout_handler']) : $value['logout_handler'];
            unset($value['logout_handler']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['enabled'])) {
            $output['enabled'] = $this->enabled;
        }
        if (isset($this->_usedProperties['match'])) {
            $output['match'] = $this->match->toArray();
        }
        if (isset($this->_usedProperties['hashCacheTtl'])) {
            $output['hash_cache_ttl'] = $this->hashCacheTtl;
        }
        if (isset($this->_usedProperties['alwaysVaryOnContextHash'])) {
            $output['always_vary_on_context_hash'] = $this->alwaysVaryOnContextHash;
        }
        if (isset($this->_usedProperties['userIdentifierHeaders'])) {
            $output['user_identifier_headers'] = $this->userIdentifierHeaders;
        }
        if (isset($this->_usedProperties['sessionNamePrefix'])) {
            $output['session_name_prefix'] = $this->sessionNamePrefix;
        }
        if (isset($this->_usedProperties['userHashHeader'])) {
            $output['user_hash_header'] = $this->userHashHeader;
        }
        if (isset($this->_usedProperties['roleProvider'])) {
            $output['role_provider'] = $this->roleProvider;
        }
        if (isset($this->_usedProperties['logoutHandler'])) {
            $output['logout_handler'] = $this->logoutHandler instanceof \Symfony\Config\FosHttpCache\UserContext\LogoutHandlerConfig ? $this->logoutHandler->toArray() : $this->logoutHandler;
        }

        return $output;
    }

}
