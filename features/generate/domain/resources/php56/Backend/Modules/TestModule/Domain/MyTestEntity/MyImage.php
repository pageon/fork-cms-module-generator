<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity;

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

    /**
     * @return string
     */
    protected function getUploadDir()
    {
        return 'TestModule/MyTestEntity/MyImage';
    }
}
