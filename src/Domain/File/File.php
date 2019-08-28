<?php

namespace ModuleGenerator\Domain\File;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;

class File extends GeneratableClass
{
    /** @var ClassName */
    private $className;

    /** @var string */
    private $maxFileSize;

    /** @var string */
    private $uploadDirectory;

    public function __construct(
        ClassName $className,
        ?string $maxFileSize,
        string $uploadDirectory
    ) {
        $this->className = $className;
        $this->maxFileSize = $maxFileSize;
        $this->uploadDirectory = $uploadDirectory;
    }

    public static function fromDataTransferObject(FileDataTransferObject $fileDataTransferObject): self
    {
        $className = ClassName::fromDataTransferObject($fileDataTransferObject->className);
        $matches = 0;
        $uploadDirectory = preg_replace(
            '|\\\\Backend\\\\Modules\\\\(.+?)\\\\Domain\\\\(.+?)\\\\(.+?)$|',
            '$1/$2/$3',
            $className->getFullyQualifiedName(),
            -1,
            $matches
        );

        if ($matches === 0) {
            $uploadDirectory = $className->getRealName();
        }

        return new self(
            $className,
            $fileDataTransferObject->maxFileSize,
            $uploadDirectory
        );
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public function getMaxFileSize(): ?string
    {
        return $this->maxFileSize;
    }

    public function getUploadDirectory(): string
    {
        return $this->uploadDirectory;
    }
}
