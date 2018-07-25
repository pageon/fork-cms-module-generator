<?php

namespace ModuleGenerator\Domain\DataTransferObject;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\Domain\Entity\Entity;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;

final class DataTransferObject extends GeneratableClass
{
    /** @var Entity */
    private $entity;

    public function __construct(Entity $entity)
    {
        $this->entity = $entity;
    }

    public function getEntity(): Entity
    {
        return $this->entity;
    }

    public function getClassName(): ClassName
    {
        return new ClassName(
            $this->entity->getClassName()->getName() . 'DataTransferObject',
            $this->entity->getClassName()->getNamespace()
        );
    }
}
