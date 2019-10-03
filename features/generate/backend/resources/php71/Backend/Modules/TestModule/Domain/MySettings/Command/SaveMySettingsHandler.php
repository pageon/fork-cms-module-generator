<?php

namespace Backend\Modules\TestModule\Domain\MySettings\Command;

use Common\ModulesSettings;

final class SaveMySettingsHandler
{
    private const MODULE_NAME = 'TestModule';

    /** @var ModulesSettings */
    private $modulesSettings;

    public function __construct(ModulesSettings $modulesSettings)
    {
        $this->modulesSettings = $modulesSettings;
    }

    public function handle(SaveMySettings $saveMySettings): void
    {
        $this->modulesSettings->set(self::MODULE_NAME, 'firstName', $saveMySettings->firstName);
        $this->modulesSettings->set(self::MODULE_NAME, 'lastName', $saveMySettings->lastName);
    }
}
