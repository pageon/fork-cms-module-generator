<?php

namespace ModuleGenerator\Domain\ValueObject;

use ModuleGenerator\PhpGenerator\ClassName\ClassNameDataTransferObject;
use ModuleGenerator\PhpGenerator\Constant\ConstantDataTransferObject;

final class ValueObjectDataTransferObject
{
    /**
     * @var ClassNameDataTransferObject
     */
    public $className;

    /**
     * @var ConstantDataTransferObject[]
     */
    public $constants;
}
