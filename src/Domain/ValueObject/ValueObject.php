<?php

namespace ModuleGenerator\Domain\ValueObject;

use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\Constant\Constant;
use ModuleGenerator\PhpGenerator\Constant\ConstantDataTransferObject;

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
            ClassName::fromDataTransferObject($valueObjectDataTransferObject->className),
            array_map(
                function (ConstantDataTransferObject $constantDataTransferObject) {
                    return Constant::fromDataTransferObject($constantDataTransferObject);
                },
                $valueObjectDataTransferObject->constants
            )
        );
    }
}
