<?php

namespace Standalone;

use InvalidArgumentException;

final class MyValueObject
{
    private const FIRST = 'first';
    private const SECOND = 'second';
    private const THIRD = 'third';
    public const POSSIBLE_VALUES = [
        self::FIRST,
        self::SECOND,
        self::THIRD,
    ];

    /** @var string */
    private $myValueObject;

    public function __construct(string $myValueObject)
    {
        if (!in_array($myValueObject, self::POSSIBLE_VALUES, true)) {
            throw new InvalidArgumentException('Invalid value');
        }

        $this->myValueObject = $myValueObject;
    }

    public function getValue(): string
    {
        return $this->myValueObject;
    }

    public function __toString(): string
    {
        return (string) $this->myValueObject;
    }

    public function equals(self $myValueObject): bool
    {
        if (!($myValueObject instanceof $this)) {
            return false;
        }

        return $myValueObject == $this;
    }

    public static function first(): self
    {
        return new self(self::FIRST);
    }

    public function isFirst(): bool
    {
        return $this->equals(self::first());
    }

    public static function second(): self
    {
        return new self(self::SECOND);
    }

    public function isSecond(): bool
    {
        return $this->equals(self::second());
    }

    public static function third(): self
    {
        return new self(self::THIRD);
    }

    public function isThird(): bool
    {
        return $this->equals(self::third());
    }
}
