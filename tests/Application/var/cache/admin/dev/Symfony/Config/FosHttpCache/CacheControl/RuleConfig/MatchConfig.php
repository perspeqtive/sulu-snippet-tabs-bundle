<?php

namespace Symfony\Config\FosHttpCache\CacheControl\RuleConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class MatchConfig 
{
    private $path;
    private $queryString;
    private $host;
    private $methods;
    private $ips;
    private $attributes;
    private $additionalResponseStatus;
    private $matchResponse;
    private $expressionLanguage;
    private $_usedProperties = [];

    /**
     * Request path.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function path($value): static
    {
        $this->_usedProperties['path'] = true;
        $this->path = $value;

        return $this;
    }

    /**
     * Request query string.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function queryString($value): static
    {
        $this->_usedProperties['queryString'] = true;
        $this->queryString = $value;

        return $this;
    }

    /**
     * Request host name.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function host($value): static
    {
        $this->_usedProperties['host'] = true;
        $this->host = $value;

        return $this;
    }

    /**
     * @return $this
     */
    public function method(string $name, mixed $value): static
    {
        $this->_usedProperties['methods'] = true;
        $this->methods[$name] = $value;

        return $this;
    }

    /**
     * @return $this
     */
    public function ip(string $name, mixed $value): static
    {
        $this->_usedProperties['ips'] = true;
        $this->ips[$name] = $value;

        return $this;
    }

    /**
     * @return $this
     */
    public function attribute(string $name, mixed $value): static
    {
        $this->_usedProperties['attributes'] = true;
        $this->attributes[$name] = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function additionalResponseStatus(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['additionalResponseStatus'] = true;
        $this->additionalResponseStatus = $value;

        return $this;
    }

    /**
     * Expression to decide whether response should be matched. Replaces cacheable configuration.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function matchResponse($value): static
    {
        $this->_usedProperties['matchResponse'] = true;
        $this->matchResponse = $value;

        return $this;
    }

    /**
     * Service name of a custom ExpressionLanguage to use.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function expressionLanguage($value): static
    {
        $this->_usedProperties['expressionLanguage'] = true;
        $this->expressionLanguage = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('path', $value)) {
            $this->_usedProperties['path'] = true;
            $this->path = $value['path'];
            unset($value['path']);
        }

        if (array_key_exists('query_string', $value)) {
            $this->_usedProperties['queryString'] = true;
            $this->queryString = $value['query_string'];
            unset($value['query_string']);
        }

        if (array_key_exists('host', $value)) {
            $this->_usedProperties['host'] = true;
            $this->host = $value['host'];
            unset($value['host']);
        }

        if (array_key_exists('methods', $value)) {
            $this->_usedProperties['methods'] = true;
            $this->methods = $value['methods'];
            unset($value['methods']);
        }

        if (array_key_exists('ips', $value)) {
            $this->_usedProperties['ips'] = true;
            $this->ips = $value['ips'];
            unset($value['ips']);
        }

        if (array_key_exists('attributes', $value)) {
            $this->_usedProperties['attributes'] = true;
            $this->attributes = $value['attributes'];
            unset($value['attributes']);
        }

        if (array_key_exists('additional_response_status', $value)) {
            $this->_usedProperties['additionalResponseStatus'] = true;
            $this->additionalResponseStatus = $value['additional_response_status'];
            unset($value['additional_response_status']);
        }

        if (array_key_exists('match_response', $value)) {
            $this->_usedProperties['matchResponse'] = true;
            $this->matchResponse = $value['match_response'];
            unset($value['match_response']);
        }

        if (array_key_exists('expression_language', $value)) {
            $this->_usedProperties['expressionLanguage'] = true;
            $this->expressionLanguage = $value['expression_language'];
            unset($value['expression_language']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['path'])) {
            $output['path'] = $this->path;
        }
        if (isset($this->_usedProperties['queryString'])) {
            $output['query_string'] = $this->queryString;
        }
        if (isset($this->_usedProperties['host'])) {
            $output['host'] = $this->host;
        }
        if (isset($this->_usedProperties['methods'])) {
            $output['methods'] = $this->methods;
        }
        if (isset($this->_usedProperties['ips'])) {
            $output['ips'] = $this->ips;
        }
        if (isset($this->_usedProperties['attributes'])) {
            $output['attributes'] = $this->attributes;
        }
        if (isset($this->_usedProperties['additionalResponseStatus'])) {
            $output['additional_response_status'] = $this->additionalResponseStatus;
        }
        if (isset($this->_usedProperties['matchResponse'])) {
            $output['match_response'] = $this->matchResponse;
        }
        if (isset($this->_usedProperties['expressionLanguage'])) {
            $output['expression_language'] = $this->expressionLanguage;
        }

        return $output;
    }

}
