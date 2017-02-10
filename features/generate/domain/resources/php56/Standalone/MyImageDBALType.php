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
    protected function createFromString($fileName)
    {
        return MyImage::fromString($fileName);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'myimage';
    }
}
