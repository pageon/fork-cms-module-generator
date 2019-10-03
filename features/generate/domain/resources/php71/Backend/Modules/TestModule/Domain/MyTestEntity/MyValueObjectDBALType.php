<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

final class MyValueObjectDBALType extends StringType
{
    public function getName(): string
    {
        return 'testmodule_mytestentity_myvalueobject';
    }

    public function convertToPHPValue($myValueObjectDBALType, AbstractPlatform $platform): MyValueObject
    {
        return new MyValueObject($myValueObjectDBALType);
    }

    public function convertToDatabaseValue($myValueObjectDBALType, AbstractPlatform $platform): string
    {
        return $myValueObjectDBALType->getValue();
    }
}
