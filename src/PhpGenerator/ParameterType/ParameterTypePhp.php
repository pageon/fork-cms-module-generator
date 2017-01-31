<?php

namespace ModuleGenerator\PhpGenerator\ParameterType;

use InvalidArgumentException;

final class ParameterTypePhp
{
    const INT = 'int';
    const STRING = 'string';
    const FLOAT = 'float';
    const RESOURCE = 'resource';
    const BOOL = 'bool';
    const ARRAY = 'array';
    const OBJECT = 'object';
    const PHP_CLASS = 'class';
    const POSSIBLE_VALUES = [
        self::INT,
        self::STRING,
        self::FLOAT,
        self::RESOURCE,
        self::BOOL,
        self::ARRAY,
        self::OBJECT,
        self::PHP_CLASS,
    ];

    /** @var string */
    private $parameterTypePhp;

    /**
     * @param string $parameterTypePhp
     */
    public function __construct(string $parameterTypePhp)
    {
        if (!in_array($parameterTypePhp, self::POSSIBLE_VALUES, true)) {
            throw new InvalidArgumentException('Invalid value');
        }

        $this->parameterTypePhp = $parameterTypePhp;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->parameterTypePhp;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->parameterTypePhp;
    }

    /**
     * @param self $parameterTypePhp
     *
     * @return bool
     */
    public function equals(self $parameterTypePhp): bool
    {
        if (!($parameterTypePhp instanceof $this)) {
            return false;
        }

        return $parameterTypePhp == $this;
    }

    /**
     * @return self
     */
    public static function int(): self
    {
        return new self(self::INT);
    }

    /**
     * @return bool
     */
    public function isInt(): bool
    {
        return $this->equals(self::int());
    }

    /**
     * @return self
     */
    public static function string(): self
    {
        return new self(self::STRING);
    }

    /**
     * @return bool
     */
    public function isString(): bool
    {
        return $this->equals(self::string());
    }

    /**
     * @return self
     */
    public static function float(): self
    {
        return new self(self::FLOAT);
    }

    /**
     * @return bool
     */
    public function isFloat(): bool
    {
        return $this->equals(self::float());
    }

    /**
     * @return self
     */
    public static function resource(): self
    {
        return new self(self::RESOURCE);
    }

    /**
     * @return bool
     */
    public function isResource(): bool
    {
        return $this->equals(self::resource());
    }

    /**
     * @return self
     */
    public static function bool(): self
    {
        return new self(self::BOOL);
    }

    /**
     * @return bool
     */
    public function isBool(): bool
    {
        return $this->equals(self::bool());
    }

    /**
     * @return self
     */
    public static function array(): self
    {
        return new self(self::ARRAY);
    }

    /**
     * @return bool
     */
    public function isArray(): bool
    {
        return $this->equals(self::array());
    }

    /**
     * @return self
     */
    public static function object(): self
    {
        return new self(self::OBJECT);
    }

    /**
     * @return bool
     */
    public function isObject(): bool
    {
        return $this->equals(self::object());
    }

    /**
     * @return self
     */
    public static function phpClass(): self
    {
        return new self(self::PHP_CLASS);
    }

    /**
     * @return bool
     */
    public function isPhpClass(): bool
    {
        return $this->equals(self::phpClass());
    }
}
