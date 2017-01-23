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

    public static function fromDataTransferObject(ValueObjectDataTransferObject $valueObjectDataTransferObject): self
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

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public function getConstants(): array
    {
        return $this->constants;
    }
}
