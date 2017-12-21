<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

final class MyValueObjectDBALType extends Type
{
    public function getName(): string
    {
        return 'testmodule_mytestentity_myvalueobject';
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
