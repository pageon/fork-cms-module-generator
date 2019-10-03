<?php

namespace ModuleGenerator\Domain\Command\Settings;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\Module\Backend\Actions\BackendSettingsActionDataTransferObject;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleName;
use ModuleGenerator\PhpGenerator\Parameter\Parameter;
use ModuleGenerator\PhpGenerator\Parameter\ParameterDataTransferObject;
use ModuleGenerator\PhpGenerator\PhpNamespace\PhpNamespace;

final class SettingsCommandHandler extends GeneratableClass
{
    /** @var ClassName */
    private $className;

    /** @var ClassName */
    private $commandClassName;

    /** @var Parameter[] */
    private $settings;

    /** @var ModuleName */
    private $moduleName;

    public function __construct(ClassName $className, ClassName $commandClassName, array $settings, ModuleName $moduleName)
    {
        $this->className = $className;
        $this->settings = $settings;
        $this->moduleName = $moduleName;
        $this->commandClassName = $commandClassName;
    }

    public function getCommandClassName(): ClassName
    {
        return $this->commandClassName;
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public function getSettings(): array
    {
        return $this->settings;
    }

    public function getModuleName(): ModuleName
    {
        return $this->moduleName;
    }

    public static function fromDataTransferObject(
        BackendSettingsActionDataTransferObject $backendSettingsActionDataTransferObject
    ): self {
        return new self(
            new ClassName(
                'Save' . $backendSettingsActionDataTransferObject->settingClassName->name . 'Handler',
                new PhpNamespace($backendSettingsActionDataTransferObject->settingClassName->namespace->name . '\Command')
            ),
            new ClassName(
                'Save' . $backendSettingsActionDataTransferObject->settingClassName->name,
                new PhpNamespace($backendSettingsActionDataTransferObject->settingClassName->namespace->name . '\Command')
            ),
            array_map(
                function (ParameterDataTransferObject $parameterDataTransferObject): Parameter {
                    return Parameter::fromDataTransferObject($parameterDataTransferObject);
                },
                $backendSettingsActionDataTransferObject->settings
            ),
            ModuleName::fromDataTransferObject($backendSettingsActionDataTransferObject->moduleName)
        );
    }
}
