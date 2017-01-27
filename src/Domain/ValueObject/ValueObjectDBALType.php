<?php

namespace ModuleGenerator\Domain\ValueObject;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;

final class ValueObjectDBALType extends GeneratableClass
{
    /** @var ClassName */
    private $className;

    /** @var ClassName */
    private $valueObjectClassName;

    /** @var string */
    private $type;

    /** @var string */
    private $name;

    /**
     * @param ClassName $className
     * @param ClassName $valueObjectClassName
     * @param string $type
     * @param string $name
     */
    public function __construct(ClassName $className, ClassName $valueObjectClassName, $type, $name)
    {
        $this->className = $className;
        $this->valueObjectClassName = $valueObjectClassName;
        $this->type = $type;
        $this->name = $name;
    }

    public static function fromValueObject(ValueObject $valueObject): self
    {
        $matches = 0;
        $name = preg_replace(
            "|\\\\Backend\\\\Modules\\\\(.+?)\\\\Domain\\\\(.+?)\\\\(.+?)$|",
            "$1_$2_$3",
            $valueObject->getClassName()->getFullyQualifiedName(),
            -1,
            $matches
        );

        if ($matches === 0) {
            $name = $valueObject->getClassName()->getRealName();
        }

        return new self(
            new ClassName(
                $valueObject->getClassName()->getRealName() . 'DBALType',
                $valueObject->getClassName()->getNamespace()
            ),
            $valueObject->getClassName(),
            $valueObject->getType(),
            mb_strtolower($name)
        );
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public function getValueObjectClassName(): ClassName
    {
        return $this->valueObjectClassName;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
