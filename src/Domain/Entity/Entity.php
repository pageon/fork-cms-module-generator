<?php

namespace ModuleGenerator\Domain\Entity;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\Parameter\Parameter;

final class Entity extends GeneratableClass
{
    /** @var ClassName */
    private $className;

    /** @var string */
    private $tableName;

    /** @var Parameter[] */
    private $parameters;

    public function __construct(ClassName $className, string $tableName, array $parameters)
    {
        $this->className = $className;
        $this->tableName = $tableName;
        $this->parameters = $parameters;
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public function getTableName(): string
    {
        return $this->tableName;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    public static function fromDataTransferObject(EntityDataTransferObject $entityDataTransferObject): self
    {
        return new self(
            ClassName::fromDataTransferObject($entityDataTransferObject->className),
            $entityDataTransferObject->tableName,
            $entityDataTransferObject->parameters
        );
    }
}
