<?php

namespace ModuleGenerator\PhpGenerator\ParameterType;

use InvalidArgumentException;

final class DBALType
{
    const SMALLINT = 'smallint';
    const INTEGER = 'integer';
    const BIGINT = 'bigint';
    const DECIMAL = 'decimal';
    const FLOAT = 'float';
    const STRING = 'string';
    const TEXT = 'text';
    const GUID = 'guid';
    const BINARY = 'binary';
    const BLOB = 'blob';
    const BOOLEAN = 'boolean';
    const DATE = 'date';
    const DATETIME = 'datetime';
    const DATETIMETZ = 'datetimetz';
    const TIME = 'time';
    const ARRAY = 'array';
    const JSON_ARRAY = 'json_array';
    const OBJECT = 'object';
    const ENUM_BOOL = 'enum_bool';
    const LOCALE = 'locale';
    const CUSTOM = 'custom';
    const POSSIBLE_VALUES = [
        self::SMALLINT,
        self::INTEGER,
        self::BIGINT,
        self::DECIMAL,
        self::FLOAT,
        self::STRING,
        self::TEXT,
        self::GUID,
        self::BINARY,
        self::BLOB,
        self::BOOLEAN,
        self::DATE,
        self::DATETIME,
        self::DATETIMETZ,
        self::TIME,
        self::ARRAY,
        self::JSON_ARRAY,
        self::OBJECT,
        self::ENUM_BOOL,
        self::LOCALE,
        self::CUSTOM,
    ];

    /** @var string */
    private $parameterTypeDoctrine;

    /**
     * @param string $parameterTypeDoctrine
     */
    public function __construct(string $parameterTypeDoctrine)
    {
        if (!in_array($parameterTypeDoctrine, self::POSSIBLE_VALUES, true)) {
            throw new InvalidArgumentException('Invalid value');
        }

        $this->parameterTypeDoctrine = $parameterTypeDoctrine;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->parameterTypeDoctrine;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->parameterTypeDoctrine;
    }

    /**
     * @param self $parameterTypeDoctrine
     *
     * @return bool
     */
    public function equals(self $parameterTypeDoctrine): bool
    {
        if (!($parameterTypeDoctrine instanceof $this)) {
            return false;
        }

        return $parameterTypeDoctrine == $this;
    }

    /**
     * @return self
     */
    public static function smallint(): self
    {
        return new self(self::SMALLINT);
    }

    /**
     * @return bool
     */
    public function isSmallint(): bool
    {
        return $this->equals(self::smallint());
    }

    /**
     * @return self
     */
    public static function integer(): self
    {
        return new self(self::INTEGER);
    }

    /**
     * @return bool
     */
    public function isInteger(): bool
    {
        return $this->equals(self::integer());
    }

    /**
     * @return self
     */
    public static function bigint(): self
    {
        return new self(self::BIGINT);
    }

    /**
     * @return bool
     */
    public function isBigint(): bool
    {
        return $this->equals(self::bigint());
    }

    /**
     * @return self
     */
    public static function decimal(): self
    {
        return new self(self::DECIMAL);
    }

    /**
     * @return bool
     */
    public function isDecimal(): bool
    {
        return $this->equals(self::decimal());
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
    public static function text(): self
    {
        return new self(self::TEXT);
    }

    /**
     * @return bool
     */
    public function isText(): bool
    {
        return $this->equals(self::text());
    }

    /**
     * @return self
     */
    public static function guid(): self
    {
        return new self(self::GUID);
    }

    /**
     * @return bool
     */
    public function isGuid(): bool
    {
        return $this->equals(self::guid());
    }

    /**
     * @return self
     */
    public static function binary(): self
    {
        return new self(self::BINARY);
    }

    /**
     * @return bool
     */
    public function isBinary(): bool
    {
        return $this->equals(self::binary());
    }

    /**
     * @return self
     */
    public static function blob(): self
    {
        return new self(self::BLOB);
    }

    /**
     * @return bool
     */
    public function isBlob(): bool
    {
        return $this->equals(self::blob());
    }

    /**
     * @return self
     */
    public static function boolean(): self
    {
        return new self(self::BOOLEAN);
    }

    /**
     * @return bool
     */
    public function isBoolean(): bool
    {
        return $this->equals(self::boolean());
    }

    /**
     * @return self
     */
    public static function date(): self
    {
        return new self(self::DATE);
    }

    /**
     * @return bool
     */
    public function isDate(): bool
    {
        return $this->equals(self::date());
    }

    /**
     * @return self
     */
    public static function datetime(): self
    {
        return new self(self::DATETIME);
    }

    /**
     * @return bool
     */
    public function isDatetime(): bool
    {
        return $this->equals(self::datetime());
    }

    /**
     * @return self
     */
    public static function datetimetz(): self
    {
        return new self(self::DATETIMETZ);
    }

    /**
     * @return bool
     */
    public function isDatetimetz(): bool
    {
        return $this->equals(self::datetimetz());
    }

    /**
     * @return self
     */
    public static function time(): self
    {
        return new self(self::TIME);
    }

    /**
     * @return bool
     */
    public function isTime(): bool
    {
        return $this->equals(self::time());
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
    public static function jsonArray(): self
    {
        return new self(self::JSON_ARRAY);
    }

    /**
     * @return bool
     */
    public function isJsonArray(): bool
    {
        return $this->equals(self::jsonArray());
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
    public static function enumBool(): self
    {
        return new self(self::ENUM_BOOL);
    }

    /**
     * @return bool
     */
    public function isEnumBool(): bool
    {
        return $this->equals(self::enumBool());
    }

    /**
     * @return self
     */
    public static function locale(): self
    {
        return new self(self::LOCALE);
    }

    /**
     * @return bool
     */
    public function isLocale(): bool
    {
        return $this->equals(self::locale());
    }

    /**
     * @return self
     */
    public static function custom(): self
    {
        return new self(self::CUSTOM);
    }

    /**
     * @return bool
     */
    public function isCustom(): bool
    {
        return $this->equals(self::custom());
    }

    public function getPhpType(): string
    {
        switch ($this->parameterTypeDoctrine) {
            case self::SMALLINT:
            case self::INTEGER:
            case self::BIGINT:
                return 'int';
            case self::DECIMAL:
            case self::FLOAT:
                return 'float';
            case self::STRING:
            case self::TEXT:
            case self::GUID:
            case self::BINARY:
            case self::BLOB:
                return 'string';
            case self::BOOLEAN:
                return 'bool';
            case self::DATE:
            case self::DATETIME:
            case self::DATETIMETZ:
            case self::TIME:
                return '\DateTime';
            case self::ARRAY:
            case self::JSON_ARRAY:
            case self::OBJECT:
            case self::ENUM_BOOL:
                return 'array';
            case self::LOCALE:
                return 'string';
            case self::CUSTOM:
            default:
                return '';
        }
    }
}
