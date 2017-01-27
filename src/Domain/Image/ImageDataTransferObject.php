<?php

namespace ModuleGenerator\Domain\Image;

use ModuleGenerator\PhpGenerator\ClassName\ClassNameDataTransferObject;

final class ImageDataTransferObject
{
    /** @var ClassNameDataTransferObject */
    public $className;

    /** @var string */
    public $maxFileSize;

    /** @var string */
    public $mimeTypes;

    /** @var string */
    public $mimeTypeErrorMessage;
}
