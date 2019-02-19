<?php

namespace Standalone;

use Common\Doctrine\Type\AbstractFileType;
use Common\Doctrine\ValueObject\AbstractFile;

class MyFileWithoutMaxSizeAssertDBALType extends AbstractFileType
{
    protected function createFromString(string $fileName): AbstractFile
    {
        return MyFileWithoutMaxSizeAssert::fromString($fileName);
    }

    public function getName(): string
    {
        return 'myfilewithoutmaxsizeassert';
    }
}
