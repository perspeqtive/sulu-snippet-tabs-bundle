<?php

namespace Symfony\Config\SuluMedia;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FfmpegConfig 
{
    private $ffmpegBinary;
    private $ffprobeBinary;
    private $binaryTimeout;
    private $threadsCount;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function ffmpegBinary($value): static
    {
        $this->_usedProperties['ffmpegBinary'] = true;
        $this->ffmpegBinary = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function ffprobeBinary($value): static
    {
        $this->_usedProperties['ffprobeBinary'] = true;
        $this->ffprobeBinary = $value;

        return $this;
    }

    /**
     * @default 60
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function binaryTimeout($value): static
    {
        $this->_usedProperties['binaryTimeout'] = true;
        $this->binaryTimeout = $value;

        return $this;
    }

    /**
     * @default 4
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function threadsCount($value): static
    {
        $this->_usedProperties['threadsCount'] = true;
        $this->threadsCount = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('ffmpeg_binary', $value)) {
            $this->_usedProperties['ffmpegBinary'] = true;
            $this->ffmpegBinary = $value['ffmpeg_binary'];
            unset($value['ffmpeg_binary']);
        }

        if (array_key_exists('ffprobe_binary', $value)) {
            $this->_usedProperties['ffprobeBinary'] = true;
            $this->ffprobeBinary = $value['ffprobe_binary'];
            unset($value['ffprobe_binary']);
        }

        if (array_key_exists('binary_timeout', $value)) {
            $this->_usedProperties['binaryTimeout'] = true;
            $this->binaryTimeout = $value['binary_timeout'];
            unset($value['binary_timeout']);
        }

        if (array_key_exists('threads_count', $value)) {
            $this->_usedProperties['threadsCount'] = true;
            $this->threadsCount = $value['threads_count'];
            unset($value['threads_count']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['ffmpegBinary'])) {
            $output['ffmpeg_binary'] = $this->ffmpegBinary;
        }
        if (isset($this->_usedProperties['ffprobeBinary'])) {
            $output['ffprobe_binary'] = $this->ffprobeBinary;
        }
        if (isset($this->_usedProperties['binaryTimeout'])) {
            $output['binary_timeout'] = $this->binaryTimeout;
        }
        if (isset($this->_usedProperties['threadsCount'])) {
            $output['threads_count'] = $this->threadsCount;
        }

        return $output;
    }

}
