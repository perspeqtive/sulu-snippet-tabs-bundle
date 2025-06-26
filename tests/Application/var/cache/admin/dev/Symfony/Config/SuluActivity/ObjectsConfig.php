<?php

namespace Symfony\Config\SuluActivity;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Objects'.\DIRECTORY_SEPARATOR.'ActivityConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ObjectsConfig 
{
    private $activity;
    private $_usedProperties = [];

    /**
     * @default {"model":"Sulu\\Bundle\\ActivityBundle\\Domain\\Model\\Activity"}
    */
    public function activity(array $value = []): \Symfony\Config\SuluActivity\Objects\ActivityConfig
    {
        if (null === $this->activity) {
            $this->_usedProperties['activity'] = true;
            $this->activity = new \Symfony\Config\SuluActivity\Objects\ActivityConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "activity()" has already been initialized. You cannot pass values the second time you call activity().');
        }

        return $this->activity;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('activity', $value)) {
            $this->_usedProperties['activity'] = true;
            $this->activity = new \Symfony\Config\SuluActivity\Objects\ActivityConfig($value['activity']);
            unset($value['activity']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['activity'])) {
            $output['activity'] = $this->activity->toArray();
        }

        return $output;
    }

}
