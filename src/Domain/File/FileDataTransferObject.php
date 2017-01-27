<?php

namespace ModuleGenerator\Domain\File;

use ModuleGenerator\PhpGenerator\ClassName\ClassNameDataTransferObject;

final class FileDataTransferObject
{
    /** @var ClassNameDataTransferObject */
    public $className;

    /** @var string */
    public $maxFileSize;
}
