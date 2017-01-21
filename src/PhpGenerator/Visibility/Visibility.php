<?php

namespace ModuleGenerator\PhpGenerator\Visibility;

use InvalidArgumentException;

final class Visibility
{
    const VISIBILITY_PUBLIC = 'public';
    const VISIBILITY_PROTECTED = 'protected';
    const VISIBILITY_PRIVATE = 'private';

    /**
     * @param string $visibility
     */
    private function __construct($visibility)
    {
        if (!in_array($visibility, self::getPossibleValues(), true)) {
            throw new InvalidArgumentException('Invalid value');
        }

        $this->visibility = $visibility;
    }

    /**
     * @param string $visibility
     *
     * @return Visibility
     */
    public static function fromString($visibility)
    {
        return new self($visibility);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->visibility;
    }

    /**
     * @param Visibility $visibility
     *
     * @return bool
     */
    public function equals(Visibility $visibility)
    {
        if (!($visibility instanceof $this)) {
            return false;
        }

        return $visibility == $this;
    }

    /**
     * @return array
     */
    public static function getPossibleValues()
    {
        return [
            self::VISIBILITY_PUBLIC,
            self::VISIBILITY_PROTECTED,
            self::VISIBILITY_PRIVATE,
        ];
    }

    /**
     * @return self
     */
    public static function visibilityPublic()
    {
        return new self(self::VISIBILITY_PUBLIC);
    }

    /**
     * @return bool
     */
    public function isPublic()
    {
        return $this->equals(self::visibilityPublic());
    }

    /**
     * @return self
     */
    public static function visibilityProtected()
    {
        return new self(self::VISIBILITY_PROTECTED);
    }

    /**
     * @return bool
     */
    public function isProtected()
    {
        return $this->equals(self::visibilityProtected());
    }

    /**
     * @return self
     */
    public static function visibilityPrivate()
    {
        return new self(self::VISIBILITY_PRIVATE);
    }

    /**
     * @return bool
     */
    public function isPrivate()
    {
        return $this->equals(self::visibilityPrivate());
    }
}
