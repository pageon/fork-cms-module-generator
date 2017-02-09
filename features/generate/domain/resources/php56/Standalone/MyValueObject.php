<?php

namespace Standalone;

use InvalidArgumentException;

final class MyValueObject
{
    const FIRST = 'first';
    const SECOND = 'second';
    const THIRD = 'third';

    /** @var string */
    private $myValueObject;

    /**
     * @param string $myValueObject
     */
    public function __construct($myValueObject)
    {
        if (!in_array($myValueObject, self::getPossibleValues(), true)) {
            throw new InvalidArgumentException('Invalid value');
        }

        $this->myValueObject = $myValueObject;
    }

    /**
     * @return array
     */
    public static function getPossibleValues()
    {
        return [
            self::FIRST,
            self::SECOND,
            self::THIRD,
        ];
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->myValueObject;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->myValueObject;
    }

    /**
     * @param self $myValueObject
     *
     * @return bool
     */
    public function equals(self $myValueObject)
    {
        if (!($myValueObject instanceof $this)) {
            return false;
        }

        return $myValueObject == $this;
    }

    /**
     * @return self
     */
    public static function first()
    {
        return new self(self::FIRST);
    }

    /**
     * @return bool
     */
    public function isFirst()
    {
        return $this->equals(self::first());
    }

    /**
     * @return self
     */
    public static function second()
    {
        return new self(self::SECOND);
    }

    /**
     * @return bool
     */
    public function isSecond()
    {
        return $this->equals(self::second());
    }

    /**
     * @return self
     */
    public static function third()
    {
        return new self(self::THIRD);
    }

    /**
     * @return bool
     */
    public function isThird()
    {
        return $this->equals(self::third());
    }
}
