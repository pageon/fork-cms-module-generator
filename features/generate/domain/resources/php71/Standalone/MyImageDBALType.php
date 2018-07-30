<?php

namespace Standalone;

use Common\Doctrine\Type\AbstractImageType;
use Common\Doctrine\ValueObject\AbstractImage;

class MyImageDBALType extends AbstractImageType
{
    protected function createFromString(string $fileName): AbstractImage
    {
        return MyImage::fromString($fileName);
    }

    public function getName(): string
    {
        return 'myimage';
    }
}
