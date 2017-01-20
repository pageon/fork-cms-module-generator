<?php

namespace ModuleGenerator\Domain\ValueObject;

use ModuleGenerator\PhpGenerator\Constant\ConstantDataTransferObject;
use ModuleGenerator\PhpGenerator\Namespaces\NamespaceDataTransferObject;

final class ValueObjectDataTransferObject
{
    /**
     * @var NamespaceDataTransferObject
     */
    public $namespace;

    /**
     * @var string
     */
    public $className;

    /**
     * @var ConstantDataTransferObject[]
     */
    public $constants;
}
