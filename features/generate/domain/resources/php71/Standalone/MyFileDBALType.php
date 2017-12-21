<?php

namespace Standalone;

use Common\Doctrine\Type\AbstractFileType;

class MyFileDBALType extends AbstractFileType
{
    protected function createFromString(string $fileName): MyFile
    {
        return MyFile::fromString($fileName);
    }

    public function getName(): string
    {
        return 'myfile';
    }
}
