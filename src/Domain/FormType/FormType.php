<?php

namespace ModuleGenerator\Domain\FormType;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\Domain\Entity\Entity;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\Parameter\Parameter;
use ModuleGenerator\PhpGenerator\PhpNamespace\PhpNamespace;

final class FormType extends GeneratableClass
{
    /** @var Entity */
    private $entity;

    /** @var array */
    private $formFields;

    public function __construct(Entity $entity)
    {
        $this->entity = $entity;
        $this->formFields = $this->createFormFields();
    }

    public function getEntity(): Entity
    {
        return $this->entity;
    }

    public function getClassName(): ClassName
    {
        return new ClassName(
            $this->entity->getClassName()->getName() . 'Type',
            $this->entity->getClassName()->getNamespace()
        );
    }

    private function createFormFields(): array
    {
        $formFields = [];
        foreach ($this->entity->getParameters() as $parameter) {
            $formFields[] = [
                'parameter' => $parameter,
                'formType' => $this->getFieldForParameter($parameter),
            ];
        }

        return array_filter($formFields);
    }

    public function getFormFields(): array
    {
        return $this->formFields;
    }

    public function getFormFieldUseStatements(): array
    {
        return array_unique(
            array_map(
                function (array $parameter): string {
                    return $parameter['formType']->getForUseStatement();
                },
                $this->formFields
            )
        );
    }

    private function getFieldForParameter(Parameter $parameter): ?ClassName
    {
        $parameterDbalType = $parameter->getDbalType();
        switch (true) {
            case $parameterDbalType->isString():
                return $this->getSymfonyFormType('TextType');
            case $parameterDbalType->isBoolean():
            case $parameterDbalType->isEnumBool():
                return $this->getSymfonyFormType('CheckboxType');
            case $parameterDbalType->isTime():
                return $this->getSymfonyFormType('TimeType');
            case $parameterDbalType->isDate():
                return $this->getSymfonyFormType('DateType');
            case $parameterDbalType->isDatetime():
            case $parameterDbalType->isDatetimetz():
                return $this->getSymfonyFormType('DateTimeType');
            case $parameterDbalType->isSmallint():
            case $parameterDbalType->isInteger():
            case $parameterDbalType->isBigint():
                return $this->getSymfonyFormType('IntegerType');
            case $parameterDbalType->isDecimal():
            case $parameterDbalType->isFloat():
                return $this->getSymfonyFormType('NumberType');
            case $parameterDbalType->isText():
                return new ClassName('EditorType', new PhpNamespace('Backend\Form\Type'));
            default:
                return null;
        }
    }

    private function getSymfonyFormType(string $type): ClassName
    {
        return new ClassName($type, new PhpNamespace('Symfony\Component\Form\Extension\Core\Type'));
    }
}
