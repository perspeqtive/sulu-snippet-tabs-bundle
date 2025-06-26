<?php

namespace Symfony\Config\SuluAudienceTargeting;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Hit'.\DIRECTORY_SEPARATOR.'HeadersConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class HitConfig 
{
    private $url;
    private $headers;
    private $_usedProperties = [];

    /**
     * @default '/_sulu_target_group_hit'
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
     * @default {"referrer":"X-Forwarded-Referrer","uuid":"X-Forwarded-UUID"}
    */
    public function headers(array $value = []): \Symfony\Config\SuluAudienceTargeting\Hit\HeadersConfig
    {
        if (null === $this->headers) {
            $this->_usedProperties['headers'] = true;
            $this->headers = new \Symfony\Config\SuluAudienceTargeting\Hit\HeadersConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "headers()" has already been initialized. You cannot pass values the second time you call headers().');
        }

        return $this->headers;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('url', $value)) {
            $this->_usedProperties['url'] = true;
            $this->url = $value['url'];
            unset($value['url']);
        }

        if (array_key_exists('headers', $value)) {
            $this->_usedProperties['headers'] = true;
            $this->headers = new \Symfony\Config\SuluAudienceTargeting\Hit\HeadersConfig($value['headers']);
            unset($value['headers']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['url'])) {
            $output['url'] = $this->url;
        }
        if (isset($this->_usedProperties['headers'])) {
            $output['headers'] = $this->headers->toArray();
        }

        return $output;
    }

}
