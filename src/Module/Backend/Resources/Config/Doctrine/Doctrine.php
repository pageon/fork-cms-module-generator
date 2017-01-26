<?php

namespace ModuleGenerator\Module\Backend\Resources\Config\Doctrine;

use ModuleGenerator\CLI\Service\Generate\GeneratableModuleFile;

final class Doctrine extends GeneratableModuleFile
{
    public function getFilePath(float $targetPhpVersion): string
    {
        return 'Backend/Modules/' . $this->getModuleName() . '/Resources/config/doctrine.yml';
    }

    public function getTemplatePath(float $targetPhpVersion): string
    {
        return __DIR__ . '/doctrine.yml.twig';
    }
}
