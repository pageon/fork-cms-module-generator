<?php

namespace Standalone;

use Common\Doctrine\Type\AbstractImageType;
use Common\Doctrine\ValueObject\AbstractImage;

class MyImageWithoutMaxSizeAssertDBALType extends AbstractImageType
{
    protected function createFromString(string $fileName): AbstractImage
    {
        return MyImageWithoutMaxSizeAssert::fromString($fileName);
    }

    public function getName(): string
    {
        return 'myimagewithoutmaxsizeassert';
    }
}
