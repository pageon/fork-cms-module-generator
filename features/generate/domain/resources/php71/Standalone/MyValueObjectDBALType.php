<?php

namespace Standalone;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

final class MyValueObjectDBALType extends StringType
{
    public function getName(): string
    {
        return 'myvalueobject';
    }

    public function convertToPHPValue($myValueObjectDBALType, AbstractPlatform $platform): ?MyValueObject
    {
        if ($myValueObjectDBALType === null) {
            return null;
        }

        return new MyValueObject($myValueObjectDBALType);
    }

    public function convertToDatabaseValue($myValueObjectDBALType, AbstractPlatform $platform): string
    {
        return $myValueObjectDBALType->getValue();
    }
}
