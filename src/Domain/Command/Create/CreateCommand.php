<?php

namespace ModuleGenerator\Domain\Command\Create;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\Domain\Command\CRUDCommandDataTransferObject;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\PhpNamespace\PhpNamespace;

final class CreateCommand extends GeneratableClass
{
    /** @var ClassName */
    private $className;

    /** @var ClassName */
    private $dataTransferObjectClassName;

    public function __construct(
        ClassName $className,
        ClassName $dataTransferObjectClassName
    ) {
        $this->className = $className;
        $this->dataTransferObjectClassName = $dataTransferObjectClassName;
    }

    public function getClassName(): ClassName
    {
        return $this->className;
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
                'Create' . $entityClassName->getRealName(),
                PhpNamespace::fromDataTransferObject($CRUDCommandDataTransferObject->commandNamespace)
            ),
            new ClassName($entityClassName->getRealName() . 'DataTransferObject', $entityClassName->getNamespace())
        );
    }
}
