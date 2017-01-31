<?php

namespace ModuleGenerator\Domain\Entity;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;

final class Entity extends GeneratableClass
{
    /** @var ClassName */
    private $className;

    /** @var string */
    private $tableName;

    /**
     * @param ClassName $className
     * @param string $tableName
     */
    public function __construct(ClassName $className, string $tableName)
    {
        $this->className = $className;
        $this->tableName = $tableName;
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public function getTableName(): string
    {
        return $this->tableName;
    }

    public static function fromDataTransferObject(EntityDataTransferObject $entityDataTransferObject): self
    {
        return new self(
            ClassName::fromDataTransferObject($entityDataTransferObject->className),
            $entityDataTransferObject->tableName
        );
    }
}
