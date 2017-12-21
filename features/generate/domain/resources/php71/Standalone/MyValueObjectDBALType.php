<?php

namespace Standalone;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

final class MyValueObjectDBALType extends Type
{
    public function getName(): string
    {
        return 'myvalueobject';
    }

    public function convertToPHPValue(string $myValueObjectDBALType, AbstractPlatform $platform): MyValueObject
    {
        return new MyValueObject($myValueObjectDBALType);
    }

    public function convertToDatabaseValue(MyValueObject $myValueObjectDBALType, AbstractPlatform $platform): string
    {
        return $myValueObjectDBALType->getValue();
    }
}
