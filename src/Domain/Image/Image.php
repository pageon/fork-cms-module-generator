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

    public function __construct(
        ClassName $className,
        string $maxFileSize,
        string $mimeTypes,
        string $mimeTypeErrorMessage
    ) {
        $this->className = $className;
        $this->maxFileSize = $maxFileSize;
        $this->mimeTypes = $mimeTypes;
        $this->mimeTypeErrorMessage = $mimeTypeErrorMessage;
    }

    public static function fromDataTransferObject(ImageDataTransferObject $imageDataTransferObject): self
    {
        return new self(
            ClassName::fromDataTransferObject($imageDataTransferObject->className),
            $imageDataTransferObject->maxFileSize,
            $imageDataTransferObject->mimeTypes,
            $imageDataTransferObject->mimeTypeErrorMessage
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
}
