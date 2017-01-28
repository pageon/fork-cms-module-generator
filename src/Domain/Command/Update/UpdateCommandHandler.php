<?php

namespace ModuleGenerator\Domain\Command\Update;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\Domain\Command\CRUDCommandDataTransferObject;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\PhpNamespace\PhpNamespace;

final class UpdateCommandHandler extends GeneratableClass
{
    /** @var ClassName */
    private $className;

    /** @var ClassName */
    private $entityClassName;

    /** @var ClassName */
    private $commandClassName;

    public function __construct(
        ClassName $className,
        ClassName $entityClassName,
        ClassName $commandClassName
    ) {
        $this->className = $className;
        $this->entityClassName = $entityClassName;
        $this->commandClassName = $commandClassName;
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public function getEntityClassName(): ClassName
    {
        return $this->entityClassName;
    }

    public function getCommandClassName(): ClassName
    {
        return $this->commandClassName;
    }

    public static function fromDataTransferObject(CRUDCommandDataTransferObject $CRUDCommandDataTransferObject): self
    {
        $entityClassName = ClassName::fromDataTransferObject($CRUDCommandDataTransferObject->entityClassName);

        return new self(
            new ClassName(
                'Update' . $entityClassName->getRealName() . 'Handler',
                PhpNamespace::fromDataTransferObject($CRUDCommandDataTransferObject->commandNamespace)
            ),
            $entityClassName,
            new ClassName('Update' . $entityClassName->getRealName(), $entityClassName->getNamespace())
        );
    }
}
