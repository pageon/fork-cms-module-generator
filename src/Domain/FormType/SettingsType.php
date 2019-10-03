<?php

namespace ModuleGenerator\Domain\FormType;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\Module\Backend\Actions\BackendSettingsActionDataTransferObject;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\Parameter\Parameter;
use ModuleGenerator\PhpGenerator\Parameter\ParameterDataTransferObject;
use ModuleGenerator\PhpGenerator\PhpNamespace\PhpNamespace;

final class SettingsType extends GeneratableClass
{
    /** @var ClassName */
    private $settingsClass;

    /** @var Parameter[] */
    private $settings;

    /** @var array */
    private $formFields;

    public function __construct(ClassName $settingsClass, array $settings)
    {
        $this->settingsClass = $settingsClass;
        $this->settings = $settings;
        $this->formFields = $this->createFormFields();
    }

    public static function fromDataTransferObject(
        BackendSettingsActionDataTransferObject $backendSettingsActionDataTransferObject
    ): self {
        return new self(
            ClassName::fromDataTransferObject($backendSettingsActionDataTransferObject->settingClassName),
            array_map(
                function (ParameterDataTransferObject $parameterDataTransferObject): Parameter {
                    return Parameter::fromDataTransferObject($parameterDataTransferObject);
                },
                $backendSettingsActionDataTransferObject->settings
            )
        );
    }

    public function getClassName(): ClassName
    {
        return new ClassName(
            $this->settingsClass->getName() . 'Type',
            $this->settingsClass->getNamespace()
        );
    }

    private function createFormFields(): array
    {
        $formFields = [];
        foreach ($this->settings as $setting) {
            $formField = $this->getFieldForSetting($setting);
            if ($formField === null) {
                continue;
            }

            $formFields[] = [
                'setting' => $setting,
                'formType' => $this->getFieldForSetting($setting),
            ];
        }

        return $formFields;
    }

    public function getFormFields(): array
    {
        return $this->formFields;
    }

    public function getFormFieldUseStatements(): array
    {
        return array_unique(
            array_map(
                function (array $setting): string {
                    return $setting['formType']->getForUseStatement();
                },
                $this->formFields
            )
        );
    }

    public function getDataClass(): ClassName
    {
        return new ClassName(
            'Save' . $this->settingsClass->getName(),
            new PhpNamespace($this->settingsClass->getNamespace()->getName() . '\Command')
        );
    }

    private function getFieldForSetting(Parameter $setting): ?ClassName
    {
        $settingDbalType = $setting->getDbalType();
        switch (true) {
            case $settingDbalType->isString():
                return $this->getSymfonyFormType('TextType');
            case $settingDbalType->isBoolean():
            case $settingDbalType->isEnumBool():
                return $this->getSymfonyFormType('CheckboxType');
            case $settingDbalType->isTime():
                return $this->getSymfonyFormType('TimeType');
            case $settingDbalType->isDate():
                return $this->getSymfonyFormType('DateType');
            case $settingDbalType->isDatetime():
            case $settingDbalType->isDatetimetz():
                return $this->getSymfonyFormType('DateTimeType');
            case $settingDbalType->isSmallint():
            case $settingDbalType->isInteger():
            case $settingDbalType->isBigint():
                return $this->getSymfonyFormType('IntegerType');
            case $settingDbalType->isDecimal():
            case $settingDbalType->isFloat():
                return $this->getSymfonyFormType('NumberType');
            case $settingDbalType->isText():
                return new ClassName('EditorType', new PhpNamespace('Backend\Form\Type'));
            case $settingDbalType->isImage():
                return new ClassName('ImageType', new PhpNamespace('Common\Form'));
            case $settingDbalType->isFile():
                return new ClassName('FileType', new PhpNamespace('Common\Form'));
            default:
                return null;
        }
    }

    private function getSymfonyFormType(string $type): ClassName
    {
        return new ClassName($type, new PhpNamespace('Symfony\Component\Form\Extension\Core\Type'));
    }
}
