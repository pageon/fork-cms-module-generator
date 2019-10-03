<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity;

use Common\Doctrine\ValueObject\AbstractImage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

class MyImageWithoutMaxSizeAssert extends AbstractImage
{
    /**
     * @var UploadedFile
     *
     * @Assert\File(
     *     mimeTypes = {"image/jpeg"},
     *     mimeTypesMessage = "err.JPGOnly"
     * )
     */
    protected $file;

    protected function getUploadDir(): string
    {
        return 'TestModule/MyTestEntity/MyImageWithoutMaxSizeAssert';
    }
}
