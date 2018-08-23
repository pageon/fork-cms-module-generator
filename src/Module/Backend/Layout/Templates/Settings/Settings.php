<?php

namespace ModuleGenerator\Module\Backend\Layout\Templates\Settings;

use ModuleGenerator\CLI\Service\Generate\GeneratableModuleFile;
use ModuleGenerator\Module\Backend\Actions\BackendActionDataTransferObject;
use ModuleGenerator\Module\Backend\Actions\BackendSettingsActionDataTransferObject;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleName;

final class Settings extends GeneratableModuleFile
{
    /** @var ClassName */
    private $entityClassName;

    public function __construct(ModuleName $moduleName, ClassName $entityClassName)
    {
        parent::__construct($moduleName);
        $this->entityClassName = $entityClassName;
    }

    public function getFilePath(float $targetPhpVersion): string
    {
        return 'Backend/Modules/' . $this->getModuleName() . '/Layout/Templates/' .
               $this->entityClassName->getName() . '.html.twig';
    }

    public function getEntityClassName(): ClassName
    {
        return $this->entityClassName;
    }

    public function getTemplatePath(float $targetPhpVersion): string
    {
        return __DIR__ . '/Settings.html.twig';
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
