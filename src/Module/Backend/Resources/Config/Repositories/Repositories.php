<?php

namespace ModuleGenerator\Module\Backend\Resources\Config\Repositories;

use ModuleGenerator\CLI\Service\Generate\GeneratableModuleFile;

final class Repositories extends GeneratableModuleFile
{
    public function getFilePath(float $targetPhpVersion): string
    {
        return 'Backend/Modules/' . $this->getModuleName() . '/Resources/config/repositories.yml';
    }

    public function getTemplatePath(float $targetPhpVersion): string
    {
        return __DIR__ . '/repositories.yml.twig';
    }
}
