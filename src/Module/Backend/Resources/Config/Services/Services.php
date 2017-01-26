<?php

namespace ModuleGenerator\Module\Backend\Resources\Config\Services;

use ModuleGenerator\CLI\Service\Generate\GeneratableModuleFile;

final class Services extends GeneratableModuleFile
{
    public function getFilePath(float $targetPhpVersion): string
    {
        return 'Backend/Modules/' . $this->getModuleName() . '/Resources/config/services.yml';
    }

    public function getTemplatePath(float $targetPhpVersion): string
    {
        return __DIR__ . '/services.yml.twig';
    }
}
