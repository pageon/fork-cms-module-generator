<?php

namespace ModuleGenerator\Domain\ValueObject;

use ModuleGenerator\PhpGenerator\Constant\Constant;
use ModuleGenerator\PhpGenerator\Constant\ConstantDataTransferObject;
use ModuleGenerator\PhpGenerator\Namespaces\PhpNamespace;
use Nette\PhpGenerator\ClassType;

final class ValueObject extends ClassType
{
    /**
     * @param string $name
     * @param PhpNamespace $namespace
     * @param Constant[] $constants
     */
    public function __construct($name, PhpNamespace $namespace, array $constants)
    {
        $namespace->addClass()
        parent::__construct($name, $namespace);
        $this->setConstants($constants);

        $this->generateMethods();
    }

    private function generateMethods()
    {

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
            PhpNamespace::fromDataTransferObject($valueObjectDataTransferObject->namespace),
            array_map(
                function (ConstantDataTransferObject $constantDataTransferObject) {
                    return Constant::fromDataTransferObject($constantDataTransferObject);
                },
                $valueObjectDataTransferObject->constants
            )
        );
    }
}
