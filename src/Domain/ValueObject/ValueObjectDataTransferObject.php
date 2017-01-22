<?php

namespace ModuleGenerator\Domain\ValueObject;

use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\Constant\ConstantDataTransferObject;

final class ValueObjectDataTransferObject
{
    /**
     * @var ClassName
     */
    public $className;

    /**
     * @var ConstantDataTransferObject[]
     */
    public $constants;
}
