<?php

namespace ModuleGenerator\Module\Backend\Installer\Data\Locale;

use ModuleGenerator\CLI\Service\Generate\GeneratableModuleFile;

final class Locale extends GeneratableModuleFile
{
    public function getFilePath(float $targetPhpVersion): string
    {
        return 'Backend/Modules/' . $this->getModuleName() . '/Installer/Data/locale.xml';
    }

    public function getTemplatePath(float $targetPhpVersion): string
    {
        return __DIR__ . '/locale.xml.twig';
    }
}
