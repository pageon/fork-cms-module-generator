<?php

namespace ModuleGenerator\Domain\Image;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;

final class Image extends GeneratableClass
{
    /** @var ClassName */
    private $className;

    /** @var string */
    private $maxFileSize;

    /** @var string */
    private $mimeTypes;

    /** @var string */
    private $mimeTypeErrorMessage;

    /** @var string */
    private $uploadDirectory;

    public function __construct(
        ClassName $className,
        string $maxFileSize,
        string $mimeTypes,
        string $mimeTypeErrorMessage,
        string $uploadDirectory
    ) {
        $this->className = $className;
        $this->maxFileSize = $maxFileSize;
        $this->mimeTypes = $mimeTypes;
        $this->mimeTypeErrorMessage = $mimeTypeErrorMessage;
        $this->uploadDirectory = $uploadDirectory;
    }

    public static function fromDataTransferObject(ImageDataTransferObject $imageDataTransferObject): self
    {
        $className = ClassName::fromDataTransferObject($imageDataTransferObject->className);
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
            $imageDataTransferObject->maxFileSize,
            $imageDataTransferObject->mimeTypes,
            $imageDataTransferObject->mimeTypeErrorMessage,
            $uploadDirectory
        );
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public function getMaxFileSize(): string
    {
        return $this->maxFileSize;
    }

    public function getMimeTypes(): string
    {
        return $this->mimeTypes;
    }

    public function getMimeTypeErrorMessage(): string
    {
        return $this->mimeTypeErrorMessage;
    }

    public function getUploadDirectory(): string
    {
        return $this->uploadDirectory;
    }
}
