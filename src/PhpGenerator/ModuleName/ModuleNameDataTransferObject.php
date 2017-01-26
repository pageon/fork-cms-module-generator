<?php

namespace ModuleGenerator\PhpGenerator\ModuleName;

final class ModuleNameDataTransferObject
{
    /** @var string */
    public $name;

    /** @var ModuleName|null */
    private $moduleNameClass;

    public function __construct(ModuleName $moduleName = null)
    {
        $this->moduleNameClass = $moduleName;

        if (!$this->moduleNameClass instanceof ModuleName) {
            return;
        }

        $this->name = $this->moduleNameClass->getName();
    }

    public function hasExistingModuleName(): bool
    {
        return $this->moduleNameClass instanceof ModuleName;
    }

    public function getModuleNameClass(): ModuleName
    {
        return $this->moduleNameClass;
    }
}
