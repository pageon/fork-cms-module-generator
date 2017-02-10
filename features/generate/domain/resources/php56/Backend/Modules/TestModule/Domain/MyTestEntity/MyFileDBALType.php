<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity;

use Common\Doctrine\Type\AbstractFileType;

class MyFileDBALType extends AbstractFileType
{
    /**
     * @param string $fileName
     *
     * @return MyFile
     */
    protected function createFromString($fileName)
    {
        return MyFile::fromString($fileName);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'testmodule_mytestentity_myfile';
    }
}
