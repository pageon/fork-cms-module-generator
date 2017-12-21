<?php

namespace ModuleGenerator\CLI\Service\ModuleGenerator;

use ModuleGenerator\CLI\Exception\SettingNotFound;
use Symfony\Component\Yaml\Yaml;

final class Settings
{
    const SUPPORTED_PHP_VERSIONS = 'SUPPORTED_PHP_VERSIONS';
    const DEFAULT_PHP_VERSION = 'DEFAULT_PHP_VERSION';

    /** @var array */
    private $settings = [];

    /** @var string */
    private $settingsCacheFile;

    /**
     * @param string $settingsCacheFile
     */
    public function __construct(string $settingsCacheFile)
    {
        $this->settingsCacheFile = $settingsCacheFile;

        if (file_exists($this->settingsCacheFile)) {
            return;
        }

        $this->reset();
    }

    public function get(string $setting)
    {
        if (!array_key_exists($setting, $this->settings)) {
            $this->load();
        }

        if (!array_key_exists($setting, $this->settings)) {
            throw new SettingNotFound($setting);
        }

        return $this->settings[$setting];
    }

    public function set(string $setting, $value)
    {
        if ($setting === self::SUPPORTED_PHP_VERSIONS) {
            throw new \InvalidArgumentException('You can\'t overwrite the supported PHP versions');
        }

        $this->settings[$setting] = $value;

        $this->save();
    }

    public function reset()
    {
        $this->settings = [
            self::SUPPORTED_PHP_VERSIONS => [
                5.6,
                7.0,
            ],
            self::DEFAULT_PHP_VERSION => 7.0,
        ];

        $this->save();
    }

    private function load()
    {
        $this->settings = (array) Yaml::parse(file_get_contents($this->settingsCacheFile));
        // just make sure that this is up to date
        $this->settings[self::SUPPORTED_PHP_VERSIONS] = [
            5.6,
            7.0,
        ];
    }

    private function save(): void
    {
        if (!empty($this->settingsCacheFile)) {
            file_put_contents($this->settingsCacheFile, Yaml::dump($this->settings));
        }
    }
}
