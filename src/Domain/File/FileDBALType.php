<?php

namespace ModuleGenerator\Domain\File;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;

final class FileDBALType extends GeneratableClass
{
    /** @var ClassName */
    private $className;

    /** @var ClassName */
    private $fileClassName;

    /** @var string */
    private $name;

    /**
     * @param ClassName $className
     * @param ClassName $fileClassName
     * @param string $name
     */
    public function __construct(ClassName $className, ClassName $fileClassName, $name)
    {
        $this->className = $className;
        $this->fileClassName = $fileClassName;
        $this->name = $name;
    }

    public static function fromFile(File $file): self
    {
        $matches = 0;
        $name = preg_replace(
            '|\\\\Backend\\\\Modules\\\\(.+?)\\\\Domain\\\\(.+?)\\\\(.+?)$|',
            '$1_$2_$3',
            $file->getClassName()->getFullyQualifiedName(),
            -1,
            $matches
        );

        if ($matches === 0) {
            $name = $file->getClassName()->getRealName();
        }

        return new self(
            new ClassName(
                $file->getClassName()->getRealName() . 'DBALType',
                $file->getClassName()->getNamespace()
            ),
            $file->getClassName(),
            mb_strtolower($name)
        );
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public function getFileClassName(): ClassName
    {
        return $this->fileClassName;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
