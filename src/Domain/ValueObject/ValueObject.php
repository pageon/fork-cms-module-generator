<?php

namespace ModuleGenerator\Domain\ValueObject;

use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\Constant\Constant;

final class ValueObject
{
    /** @var ClassName */
    private $className;

    /** @var Constant[] */
    private $constants;

    public function __construct(ClassName $className, array $constants)
    {
        $this->className = $className;
        $this->constants = $constants;
    }

    /**
     * @param ValueObjectDataTransferObject $valueObjectDataTransferObject
     *
     * @return ValueObject
     */
    public static function fromDataTransferObject(ValueObjectDataTransferObject $valueObjectDataTransferObject)
    {
        return new self(
            $valueObjectDataTransferObject->className,
            $valueObjectDataTransferObject->constants
        );
    }
}
