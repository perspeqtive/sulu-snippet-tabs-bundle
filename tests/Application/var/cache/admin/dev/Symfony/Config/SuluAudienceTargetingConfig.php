<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluAudienceTargeting'.\DIRECTORY_SEPARATOR.'HeadersConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluAudienceTargeting'.\DIRECTORY_SEPARATOR.'CookiesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluAudienceTargeting'.\DIRECTORY_SEPARATOR.'HitConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SuluAudienceTargeting'.\DIRECTORY_SEPARATOR.'ObjectsConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;

/**
 * This class is automatically generated to help in creating a config.
 */
class SuluAudienceTargetingConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $headers;
    private $url;
    private $cookies;
    private $hit;
    private $numberOfPriorities;
    private $objects;
    private $_usedProperties = [];

    /**
     * @default {"target_group":"X-Sulu-Target-Group","url":"X-Forwarded-URL"}
    */
    public function headers(array $value = []): \Symfony\Config\SuluAudienceTargeting\HeadersConfig
    {
        if (null === $this->headers) {
            $this->_usedProperties['headers'] = true;
            $this->headers = new \Symfony\Config\SuluAudienceTargeting\HeadersConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "headers()" has already been initialized. You cannot pass values the second time you call headers().');
        }

        return $this->headers;
    }

    /**
     * @default '/_sulu_target_group'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function url($value): static
    {
        $this->_usedProperties['url'] = true;
        $this->url = $value;

        return $this;
    }

    /**
     * @default {"target_group":"_svtg","session":"_svs"}
    */
    public function cookies(array $value = []): \Symfony\Config\SuluAudienceTargeting\CookiesConfig
    {
        if (null === $this->cookies) {
            $this->_usedProperties['cookies'] = true;
            $this->cookies = new \Symfony\Config\SuluAudienceTargeting\CookiesConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "cookies()" has already been initialized. You cannot pass values the second time you call cookies().');
        }

        return $this->cookies;
    }

    /**
     * @default {"url":"\/_sulu_target_group_hit","headers":{"referrer":"X-Forwarded-Referrer","uuid":"X-Forwarded-UUID"}}
    */
    public function hit(array $value = []): \Symfony\Config\SuluAudienceTargeting\HitConfig
    {
        if (null === $this->hit) {
            $this->_usedProperties['hit'] = true;
            $this->hit = new \Symfony\Config\SuluAudienceTargeting\HitConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "hit()" has already been initialized. You cannot pass values the second time you call hit().');
        }

        return $this->hit;
    }

    /**
     * @default 5
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function numberOfPriorities($value): static
    {
        $this->_usedProperties['numberOfPriorities'] = true;
        $this->numberOfPriorities = $value;

        return $this;
    }

    /**
     * @default {"target_group":{"model":"Sulu\\Bundle\\AudienceTargetingBundle\\Entity\\TargetGroup","repository":"Sulu\\Bundle\\AudienceTargetingBundle\\Entity\\TargetGroupRepository"},"target_group_condition":{"model":"Sulu\\Bundle\\AudienceTargetingBundle\\Entity\\TargetGroupCondition","repository":"Sulu\\Bundle\\AudienceTargetingBundle\\Entity\\TargetGroupConditionRepository"},"target_group_rule":{"model":"Sulu\\Bundle\\AudienceTargetingBundle\\Entity\\TargetGroupRule","repository":"Sulu\\Bundle\\AudienceTargetingBundle\\Entity\\TargetGroupRuleRepository"},"target_group_webspace":{"model":"Sulu\\Bundle\\AudienceTargetingBundle\\Entity\\TargetGroupWebspace","repository":"Sulu\\Bundle\\AudienceTargetingBundle\\Entity\\TargetGroupWebspaceRepository"}}
    */
    public function objects(array $value = []): \Symfony\Config\SuluAudienceTargeting\ObjectsConfig
    {
        if (null === $this->objects) {
            $this->_usedProperties['objects'] = true;
            $this->objects = new \Symfony\Config\SuluAudienceTargeting\ObjectsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "objects()" has already been initialized. You cannot pass values the second time you call objects().');
        }

        return $this->objects;
    }

    public function getExtensionAlias(): string
    {
        return 'sulu_audience_targeting';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('headers', $value)) {
            $this->_usedProperties['headers'] = true;
            $this->headers = new \Symfony\Config\SuluAudienceTargeting\HeadersConfig($value['headers']);
            unset($value['headers']);
        }

        if (array_key_exists('url', $value)) {
            $this->_usedProperties['url'] = true;
            $this->url = $value['url'];
            unset($value['url']);
        }

        if (array_key_exists('cookies', $value)) {
            $this->_usedProperties['cookies'] = true;
            $this->cookies = new \Symfony\Config\SuluAudienceTargeting\CookiesConfig($value['cookies']);
            unset($value['cookies']);
        }

        if (array_key_exists('hit', $value)) {
            $this->_usedProperties['hit'] = true;
            $this->hit = new \Symfony\Config\SuluAudienceTargeting\HitConfig($value['hit']);
            unset($value['hit']);
        }

        if (array_key_exists('number_of_priorities', $value)) {
            $this->_usedProperties['numberOfPriorities'] = true;
            $this->numberOfPriorities = $value['number_of_priorities'];
            unset($value['number_of_priorities']);
        }

        if (array_key_exists('objects', $value)) {
            $this->_usedProperties['objects'] = true;
            $this->objects = new \Symfony\Config\SuluAudienceTargeting\ObjectsConfig($value['objects']);
            unset($value['objects']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['headers'])) {
            $output['headers'] = $this->headers->toArray();
        }
        if (isset($this->_usedProperties['url'])) {
            $output['url'] = $this->url;
        }
        if (isset($this->_usedProperties['cookies'])) {
            $output['cookies'] = $this->cookies->toArray();
        }
        if (isset($this->_usedProperties['hit'])) {
            $output['hit'] = $this->hit->toArray();
        }
        if (isset($this->_usedProperties['numberOfPriorities'])) {
            $output['number_of_priorities'] = $this->numberOfPriorities;
        }
        if (isset($this->_usedProperties['objects'])) {
            $output['objects'] = $this->objects->toArray();
        }

        return $output;
    }

}
