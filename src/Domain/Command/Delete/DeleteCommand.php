<?php

namespace ModuleGenerator\Domain\Command\Delete;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\Domain\Command\CRUDCommandDataTransferObject;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\PhpNamespace\PhpNamespace;

final class DeleteCommand extends GeneratableClass
{
    /** @var ClassName */
    private $className;

    /** @var ClassName */
    private $entityClassName;

    public function __construct(
        ClassName $className,
        ClassName $entityClassName
    ) {
        $this->className = $className;
        $this->entityClassName = $entityClassName;
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public function getEntityClassName(): ClassName
    {
        return $this->entityClassName;
    }

    public static function fromDataTransferObject(CRUDCommandDataTransferObject $CRUDCommandDataTransferObject): self
    {
        $entityClassName = ClassName::fromDataTransferObject($CRUDCommandDataTransferObject->entityClassName);

        return new self(
            new ClassName(
                'Delete' . $entityClassName->getRealName(),
                PhpNamespace::fromDataTransferObject($CRUDCommandDataTransferObject->commandNamespace)
            ),
            $entityClassName
        );
    }
}
