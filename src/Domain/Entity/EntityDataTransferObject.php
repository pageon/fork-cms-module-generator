<?php

namespace ModuleGenerator\Domain\Entity;

use ModuleGenerator\PhpGenerator\ClassName\ClassNameDataTransferObject;
use ModuleGenerator\PhpGenerator\Parameter\Parameter;

final class EntityDataTransferObject
{
    /** @var ClassNameDataTransferObject */
    public $className;

    /** @var string */
    public $tableName;

    /** @var Parameter[] */
    public $parameters;
}
