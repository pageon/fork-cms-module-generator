<?php

namespace ModuleGenerator\Module\Backend\Actions\Detail;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\Module\Backend\Actions\CRUDActionsDataTransferObject;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleName;
use ModuleGenerator\PhpGenerator\PhpNamespace\PhpNamespace;

final class Detail extends GeneratableClass
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
            $this->entityClassName->getName() . 'Detail',
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

    public static function fromDataTransferObject(CRUDActionsDataTransferObject $crudActionsDataTransferObject): self
    {
        return new self(
            ModuleName::fromDataTransferObject($crudActionsDataTransferObject->moduleName),
            ClassName::fromDataTransferObject($crudActionsDataTransferObject->entityClassName)
        );
    }
}
