<?php

namespace Standalone;

use InvalidArgumentException;

final class MyValueObject
{
    const FIRST = 'first';
    const SECOND = 'second';
    const THIRD = 'third';
    const POSSIBLE_VALUES = [
        self::FIRST,
        self::SECOND,
        self::THIRD,
    ];

    /** @var string */
    private $myValueObject;

    /**
     * @param string $myValueObject
     */
    public function __construct(string $myValueObject)
    {
        if (!in_array($myValueObject, self::POSSIBLE_VALUES, true)) {
            throw new InvalidArgumentException('Invalid value');
        }

        $this->myValueObject = $myValueObject;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->myValueObject;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->myValueObject;
    }

    /**
     * @param self $myValueObject
     *
     * @return bool
     */
    public function equals(self $myValueObject): bool
    {
        if (!($myValueObject instanceof $this)) {
            return false;
        }

        return $myValueObject == $this;
    }

    /**
     * @return self
     */
    public static function first(): self
    {
        return new self(self::FIRST);
    }

    /**
     * @return bool
     */
    public function isFirst(): bool
    {
        return $this->equals(self::first());
    }

    /**
     * @return self
     */
    public static function second(): self
    {
        return new self(self::SECOND);
    }

    /**
     * @return bool
     */
    public function isSecond(): bool
    {
        return $this->equals(self::second());
    }

    /**
     * @return self
     */
    public static function third(): self
    {
        return new self(self::THIRD);
    }

    /**
     * @return bool
     */
    public function isThird(): bool
    {
        return $this->equals(self::third());
    }
}
