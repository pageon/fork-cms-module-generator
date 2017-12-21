<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity;

use Common\Doctrine\Type\AbstractFileType;

class MyFileDBALType extends AbstractFileType
{
    protected function createFromString(string $fileName): MyFile
    {
        return MyFile::fromString($fileName);
    }

    public function getName(): string
    {
        return 'testmodule_mytestentity_myfile';
    }
}
