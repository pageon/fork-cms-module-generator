<?php

namespace ModuleGenerator\PhpGenerator\ClassName;

use ModuleGenerator\PhpGenerator\PhpNamespace\PhpNamespace;

final class ClassName
{
    /** @var string */
    private $name;

    /** @var PhpNamespace */
    private $namespace;

    /** @var string */
    private $alias;

    public function __construct(string $name, PhpNamespace $namespace, string $alias = null)
    {
        $this->name = ucfirst($name);
        $this->namespace = $namespace;
        $this->alias = empty($alias) ? null : ucfirst($alias);
    }

    public function getRealName(): string
    {
        return $this->name;
    }

    public function getNamespace(): PhpNamespace
    {
        return $this->namespace;
    }

    public function getAlias(): string
    {
        return (string) $this->alias;
    }

    public function getFullyQualifiedName(): string
    {
        if ($this->namespace->isRoot()) {
            return '\\' . $this->name . (($this->alias === null) ? '' : ' as ' . $this->alias);
        }

        return '\\' . $this->namespace . '\\' . $this->name;
    }

    public function getForUseStatement(): string
    {
        if ($this->namespace->isRoot()) {
            return $this->name . (($this->alias === null) ? '' : ' as ' . $this->alias);
        }

        return $this->namespace . '\\' . $this->name . (($this->alias === null) ? '' : ' as ' . $this->alias);
    }

    public function getForParameter(): string
    {
        return lcfirst($this->name);
    }

    public function getName(): string
    {
        if ($this->alias === null) {
            return $this->name;
        }

        return $this->alias;
    }

    public function __toString(): string
    {
        return $this->getName();
    }

    public static function fromDataTransferObject(
        ClassNameDataTransferObject $classNameDataTransferObject
    ): self {
        $namespace = PhpNamespace::fromDataTransferObject($classNameDataTransferObject->namespace);
        if ($classNameDataTransferObject->hasExistingClassName()) {
            $classNameDataTransferObject->getClassNameClass()->name = ucfirst($classNameDataTransferObject->name);
            $classNameDataTransferObject->getClassNameClass()->namespace = $namespace;
            $classNameDataTransferObject->getClassNameClass()->alias = empty($classNameDataTransferObject->alias)
                ? null : ucfirst($classNameDataTransferObject->alias);

            return $classNameDataTransferObject->getClassNameClass();
        }

        return new self(
            $classNameDataTransferObject->name,
            $namespace,
            $classNameDataTransferObject->alias
        );
    }
}
