<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity;

use Common\Doctrine\Type\AbstractImageType;

class MyImageDBALType extends AbstractImageType
{
    protected function createFromString(string $fileName): MyImage
    {
        return MyImage::fromString($fileName);
    }

    public function getName(): string
    {
        return 'testmodule_mytestentity_myimage';
    }
}
