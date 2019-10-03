<?php

namespace ModuleGenerator\Domain\DataGrid;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleName;

final class DataGrid extends GeneratableClass
{
    /** @var ModuleName */
    private $moduleName;

    /** @var ClassName */
    private $entityClassName;

    /** @var ClassName */
    private $className;

    /** @var string */
    private $tableName;

    public function __construct(
        ModuleName $moduleName,
        ClassName $entityClassName,
        string $tableName
    ) {
        $this->tableName = $tableName;
        $this->moduleName = $moduleName;
        $this->entityClassName = $entityClassName;
        $this->className = new ClassName(
            $this->entityClassName->getName() . 'DataGrid',
            $this->entityClassName->getNamespace()
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

    public function getTableName(): string
    {
        return $this->tableName;
    }

    public static function fromDataTransferObject(DataGridDataTransferObject $dataGridDataTransferObject): self
    {
        return new self(
            ModuleName::fromDataTransferObject($dataGridDataTransferObject->moduleName),
            ClassName::fromDataTransferObject($dataGridDataTransferObject->entityClassName),
            $dataGridDataTransferObject->tableName
        );
    }
}
