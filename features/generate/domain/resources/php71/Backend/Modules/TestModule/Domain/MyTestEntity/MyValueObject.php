<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity;

use InvalidArgumentException;

final class MyValueObject
{
    private const FIRST_HAND = 'first';
    private const SECOND_HAND = 'second';
    private const THIRD_HAND = 'third';
    public const POSSIBLE_VALUES = [
        self::FIRST_HAND,
        self::SECOND_HAND,
        self::THIRD_HAND,
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

    public static function firstHand(): self
    {
        return new self(self::FIRST_HAND);
    }

    public function isFirstHand(): bool
    {
        return $this->equals(self::firstHand());
    }

    public static function secondHand(): self
    {
        return new self(self::SECOND_HAND);
    }

    public function isSecondHand(): bool
    {
        return $this->equals(self::secondHand());
    }

    public static function thirdHand(): self
    {
        return new self(self::THIRD_HAND);
    }

    public function isThirdHand(): bool
    {
        return $this->equals(self::thirdHand());
    }
}
