<?php

namespace ModuleGenerator\CLI\Service\Generate;

use ModuleGenerator\PhpGenerator\ModuleName\ModuleName;

abstract class GeneratableModuleFile extends GeneratableFile
{
    /** @var ModuleName */
    private $moduleName;

    public function __construct(ModuleName $moduleName)
    {
        $this->moduleName = $moduleName;
    }

    final public function getModuleName(): ModuleName
    {
        return $this->moduleName;
    }

    final protected function getFrontendModulePath(string $filePath = null): string
    {
        if ($filePath === null) {
            return 'Frontend/Modules/' . $this->getModuleName();
        }

        return $this->getFrontendModulePath() . '/' . $filePath;
    }

    final protected function getBackendModulePath(string $filePath = null): string
    {
        if ($filePath === null) {
            return 'Backend/Modules/' . $this->getModuleName();
        }

        return $this->getBackendModulePath() . '/' . $filePath;
    }
}
