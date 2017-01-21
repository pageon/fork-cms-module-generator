<?php

namespace ModuleGenerator\Domain\ValueObject;

use ModuleGenerator\PhpGenerator\Constant\Constant;
use ModuleGenerator\PhpGenerator\Constant\ConstantDataTransferObject;
use ModuleGenerator\PhpGenerator\Namespaces\PhpNamespace;
use Nette\PhpGenerator\ClassType;

final class ValueObject extends ClassType
{
    /**
     * @param ValueObjectDataTransferObject $valueObjectDataTransferObject
     *
     * @return ValueObject
     */
    public static function fromDataTransferObject(ValueObjectDataTransferObject $valueObjectDataTransferObject)
    {
        $valueObject = new self(
            $valueObjectDataTransferObject->className,
            PhpNamespace::fromDataTransferObject($valueObjectDataTransferObject->namespace)
        );

        $valueObject->setConstants(
            array_map(
                function (ConstantDataTransferObject $constantDataTransferObject) {
                    return Constant::fromDataTransferObject($constantDataTransferObject);
                },
                $valueObjectDataTransferObject->constants
            )
        );

        return $valueObject;
    }
}
