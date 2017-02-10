<?php

namespace Standalone;

use Common\Doctrine\Type\AbstractFileType;

class MyFileDBALType extends AbstractFileType
{
    /**
     * @param string $fileName
     *
     * @return MyFile
     */
    protected function createFromString($fileName): MyFile
    {
        return MyFile::fromString($fileName);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'myfile';
    }
}
