<?php

namespace Standalone;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

final class MyValueObjectDBALType extends Type
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'myvalueobject';
    }

    /**
     * @param string $myValueObjectDBALType
     * @param AbstractPlatform $platform
     *
     * @return MyValueObject
     */
    public function convertToPHPValue($myValueObjectDBALType, AbstractPlatform $platform)
    {
        return new MyValueObject($myValueObjectDBALType);
    }

    /**
     * @param MyValueObject $myValueObjectDBALType
     * @param AbstractPlatform $platform
     *
     * @return string
     */
    public function convertToDatabaseValue($myValueObjectDBALType, AbstractPlatform $platform)
    {
        return $myValueObjectDBALType->getValue();
    }
}
