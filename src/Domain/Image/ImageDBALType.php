<?php

namespace ModuleGenerator\Domain\Image;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;

final class ImageDBALType extends GeneratableClass
{
    /** @var ClassName */
    private $className;

    /** @var ClassName */
    private $imageClassName;

    /** @var string */
    private $name;

    /**
     * @param ClassName $className
     * @param ClassName $imageClassName
     * @param string $name
     */
    public function __construct(ClassName $className, ClassName $imageClassName, $name)
    {
        $this->className = $className;
        $this->imageClassName = $imageClassName;
        $this->name = $name;
    }

    public static function fromImage(Image $image): self
    {
        $matches = 0;
        $name = preg_replace(
            '|\\\\Backend\\\\Modules\\\\(.+?)\\\\Domain\\\\(.+?)\\\\(.+?)$|',
            '$1_$2_$3',
            $image->getClassName()->getFullyQualifiedName(),
            -1,
            $matches
        );

        if ($matches === 0) {
            $name = $image->getClassName()->getRealName();
        }

        return new self(
            new ClassName(
                $image->getClassName()->getRealName() . 'DBALType',
                $image->getClassName()->getNamespace()
            ),
            $image->getClassName(),
            mb_strtolower($name)
        );
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public function getImageClassName(): ClassName
    {
        return $this->imageClassName;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
