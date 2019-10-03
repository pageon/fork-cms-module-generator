<?php

namespace Standalone;

use Common\Doctrine\Type\AbstractFileType;
use Common\Doctrine\ValueObject\AbstractFile;

class MyFileDBALType extends AbstractFileType
{
    protected function createFromString(string $fileName): AbstractFile
    {
        return MyFile::fromString($fileName);
    }

    public function getName(): string
    {
        return 'myfile';
    }
}
