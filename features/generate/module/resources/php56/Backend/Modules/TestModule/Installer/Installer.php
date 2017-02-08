<?php

namespace Backend\Modules\TestModule\Installer;

use Backend\Core\Installer\ModuleInstaller;

final class Installer extends ModuleInstaller
{
    public function install()
    {
        $this->addModule('TestModule');

        $this->importLocale(__DIR__ . '/Data/locale.xml');
    }
}
