<?php

namespace Symfony\Config\SuluWebsite;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SitemapConfig 
{
    private $dumpDir;
    private $_usedProperties = [];

    /**
     * @default '%sulu.cache_dir%/sitemaps'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function dumpDir($value): static
    {
        $this->_usedProperties['dumpDir'] = true;
        $this->dumpDir = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('dump_dir', $value)) {
            $this->_usedProperties['dumpDir'] = true;
            $this->dumpDir = $value['dump_dir'];
            unset($value['dump_dir']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['dumpDir'])) {
            $output['dump_dir'] = $this->dumpDir;
        }

        return $output;
    }

}
