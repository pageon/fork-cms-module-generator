<?php

namespace ModuleGenerator\PhpGenerator\Visibility;

use InvalidArgumentException;

final class Visibility
{
    const VISIBILITY_PUBLIC = 'public';
    const VISIBILITY_PROTECTED = 'protected';
    const VISIBILITY_PRIVATE = 'private';

    const POSSIBLE_VALUES = [
        self::VISIBILITY_PUBLIC,
        self::VISIBILITY_PROTECTED,
        self::VISIBILITY_PRIVATE,
    ];

    private function __construct(string $visibility)
    {
        if (!in_array($visibility, self::POSSIBLE_VALUES, true)) {
            throw new InvalidArgumentException('Invalid value');
        }

        $this->visibility = $visibility;
    }

    public static function fromString(string $visibility): self
    {
        return new self($visibility);
    }

    public function __toString(): string
    {
        return (string) $this->visibility;
    }

    public function equals(Visibility $visibility): bool
    {
        if (!($visibility instanceof $this)) {
            return false;
        }

        return $visibility == $this;
    }

    public static function getPossibleValues(): array
    {
        return [
            self::VISIBILITY_PUBLIC,
            self::VISIBILITY_PROTECTED,
            self::VISIBILITY_PRIVATE,
        ];
    }

    public static function visibilityPublic(): self
    {
        return new self(self::VISIBILITY_PUBLIC);
    }

    public function isPublic(): bool
    {
        return $this->equals(self::visibilityPublic());
    }

    public static function visibilityProtected(): self
    {
        return new self(self::VISIBILITY_PROTECTED);
    }

    public function isProtected(): bool
    {
        return $this->equals(self::visibilityProtected());
    }

    public static function visibilityPrivate(): self
    {
        return new self(self::VISIBILITY_PRIVATE);
    }

    public function isPrivate(): bool
    {
        return $this->equals(self::visibilityPrivate());
    }
}
