<?php

namespace ModuleGenerator\Domain\Repository;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;

final class Repository extends GeneratableClass
{
    /** @var ClassName */
    private $className;

    /** @var ClassName */
    private $entityClassName;

    public function __construct(ClassName $className, ClassName $entityClassName)
    {
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

    public static function fromEntityClassName(ClassName $entityClassName): self
    {
        return new self(
            new ClassName($entityClassName->getRealName() . 'Repository', $entityClassName->getNamespace()),
            $entityClassName
        );
    }
}
