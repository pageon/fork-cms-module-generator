<?php

namespace ModuleGenerator\Module\Backend\Resources\Config\Commands;

use ModuleGenerator\CLI\Service\Generate\GeneratableModuleFile;

final class Commands extends GeneratableModuleFile
{
    public function getFilePath(float $targetPhpVersion): string
    {
        return 'Backend/Modules/' . $this->getModuleName() . '/Resources/config/commands.yml';
    }

    public function getTemplatePath(float $targetPhpVersion): string
    {
        return __DIR__ . '/commands.yml.twig';
    }
}
