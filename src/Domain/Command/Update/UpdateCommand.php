<?php

namespace ModuleGenerator\Domain\Command\Update;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\Domain\Command\CRUDCommandDataTransferObject;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\PhpNamespace\PhpNamespace;

final class UpdateCommand extends GeneratableClass
{
    /** @var ClassName */
    private $className;

    /** @var ClassName */
    private $entityClassName;

    /** @var ClassName */
    private $dataTransferObjectClassName;

    public function __construct(
        ClassName $className,
        ClassName $entityClassName,
        ClassName $dataTransferObjectClassName
    ) {
        $this->className = $className;
        $this->entityClassName = $entityClassName;
        $this->dataTransferObjectClassName = $dataTransferObjectClassName;
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public function getEntityClassName(): ClassName
    {
        return $this->entityClassName;
    }

    public function getDataTransferObjectClassName(): ClassName
    {
        return $this->dataTransferObjectClassName;
    }

    public static function fromDataTransferObject(CRUDCommandDataTransferObject $CRUDCommandDataTransferObject): self
    {
        $entityClassName = ClassName::fromDataTransferObject($CRUDCommandDataTransferObject->entityClassName);

        return new self(
            new ClassName(
                'Update' . $entityClassName->getRealName(),
                PhpNamespace::fromDataTransferObject($CRUDCommandDataTransferObject->commandNamespace)
            ),
            $entityClassName,
            new ClassName($entityClassName->getRealName() . 'DataTransferObject', $entityClassName->getNamespace())
        );
    }
}
