<?php

namespace Standalone;

use Common\Doctrine\Type\AbstractImageType;

class MyImageDBALType extends AbstractImageType
{
    protected function createFromString(string $fileName): MyImage
    {
        return MyImage::fromString($fileName);
    }

    public function getName(): string
    {
        return 'myimage';
    }
}
