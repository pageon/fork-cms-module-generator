<?php

namespace ModuleGenerator\Module\Backend\Actions\Settings;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\Module\Backend\Actions\BackendSettingsActionDataTransferObject;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleName;
use ModuleGenerator\PhpGenerator\PhpNamespace\PhpNamespace;

final class Settings extends GeneratableClass
{
    /** @var ModuleName */
    private $moduleName;

    /** @var ClassName */
    private $entityClassName;

    /** @var ClassName */
    private $className;

    public function __construct(
        ModuleName $moduleName,
        ClassName $entityClassName
    ) {
        $this->moduleName = $moduleName;
        $this->entityClassName = $entityClassName;
        $this->className = new ClassName(
            $this->entityClassName->getName(),
            new PhpNamespace('Backend\\Modules\\' . $this->moduleName->getName() . '\\Actions')
        );
    }

    public function getModuleName(): ModuleName
    {
        return $this->moduleName;
    }

    public function getEntityClassName(): ClassName
    {
        return $this->entityClassName;
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public static function fromDataTransferObject(
        BackendSettingsActionDataTransferObject $backendSettingsActionDataTransferObject
    ): self {
        return new self(
            ModuleName::fromDataTransferObject($backendSettingsActionDataTransferObject->moduleName),
            ClassName::fromDataTransferObject($backendSettingsActionDataTransferObject->settingClassName)
        );
    }
}
