<?php

namespace ModuleGenerator\Domain\ValueObject;

use ModuleGenerator\PhpGenerator\ClassName\ClassName;

final class ValueObjectDBALType
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
        $this->type = $type;
        $this->name = $name;
    }

    public static function fromValueObject(ValueObject $valueObject): self
    {
        return new self(
            new ClassName(
                $valueObject->getClassName()->getRealName() . 'DBALType',
                $valueObject->getClassName()->getNamespace()
            ),
            $valueObject->getClassName(),
            $valueObject->getType(),
            mb_strtolower(
                preg_replace(
                    '/Backend\\\\Modules\\\\(.+?)\\\\Domain\\\\(.+?)\\\\(.+?)$/',
                    '$1_$2_$3',
                    $valueObject->getClassName()->getFullyQualifiedName()
                )
            )
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
