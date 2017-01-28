<?php

namespace ModuleGenerator\Domain\Command\Create;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\Domain\Command\CRUDCommandDataTransferObject;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\PhpNamespace\PhpNamespace;

final class CreateCommandHandler extends GeneratableClass
{
    /** @var ClassName */
    private $className;

    /** @var ClassName */
    private $entityClassName;

    /** @var ClassName */
    private $commandClassName;

    /** @var ClassName */
    private $repositoryClassName;

    public function __construct(
        ClassName $className,
        ClassName $entityClassName,
        ClassName $commandClassName,
        ClassName $repositoryClassName
    ) {
        $this->className = $className;
        $this->entityClassName = $entityClassName;
        $this->commandClassName = $commandClassName;
        $this->repositoryClassName = $repositoryClassName;
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

    public function getRepositoryClassName(): ClassName
    {
        return $this->repositoryClassName;
    }

    public static function fromDataTransferObject(CRUDCommandDataTransferObject $CRUDCommandDataTransferObject): self
    {
        $entityClassName = ClassName::fromDataTransferObject($CRUDCommandDataTransferObject->entityClassName);

        return new self(
            new ClassName(
                'Create' . $entityClassName->getRealName() . 'Handler',
                PhpNamespace::fromDataTransferObject($CRUDCommandDataTransferObject->commandNamespace)
            ),
            $entityClassName,
            new ClassName('Create' . $entityClassName->getRealName(), $entityClassName->getNamespace()),
            new ClassName($entityClassName->getRealName() . 'Repository', $entityClassName->getNamespace())
        );
    }
}
