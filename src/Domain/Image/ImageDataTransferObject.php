<?php

namespace ModuleGenerator\Domain\Image;

use ModuleGenerator\PhpGenerator\ClassName\ClassNameDataTransferObject;

final class ImageDataTransferObject
{
    /** @var ClassNameDataTransferObject */
    public $className;

    /** @var string */
    public $maxFileSize = '2M';

    /** @var string */
    public $mimeTypes = '{"image/jpeg", "image/gif", "image/png"}';

    /** @var string */
    public $mimeTypeErrorMessage = 'err.JPGGIFAndPNGOnly';
}
