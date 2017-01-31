<?php

namespace ModuleGenerator\Domain\Entity;

use ModuleGenerator\PhpGenerator\ClassName\ClassNameDataTransferObject;

final class EntityDataTransferObject
{
    /** @var ClassNameDataTransferObject */
    public $className;

    /** @var string */
    public $tableName;
}
