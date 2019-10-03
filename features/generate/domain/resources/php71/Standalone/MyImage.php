<?php

namespace Standalone;

use Common\Doctrine\ValueObject\AbstractImage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

class MyImage extends AbstractImage
{
    /**
     * @var UploadedFile
     *
     * @Assert\File(
     *     maxSize = "5M",
     *     mimeTypes = {"image/jpeg"},
     *     mimeTypesMessage = "err.JPGOnly"
     * )
     */
    protected $file;

    protected function getUploadDir(): string
    {
        return 'MyImage';
    }
}
