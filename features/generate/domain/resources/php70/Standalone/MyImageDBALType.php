<?php

namespace Standalone;

use Common\Doctrine\Type\AbstractImageType;

class MyImageDBALType extends AbstractImageType
{
    /**
     * @param string $fileName
     *
     * @return MyImage
     */
    protected function createFromString($fileName): MyImage
    {
        return MyImage::fromString($fileName);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'myimage';
    }
}
