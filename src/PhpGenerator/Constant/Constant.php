<?php

namespace ModuleGenerator\PhpGenerator\Constant;

use InvalidArgumentException;

final class Constant
{
    /** @var string */
    private $name;

    /** @var string|int|bool|float */
    private $value;

    /**
     * @param string $name
     * @param bool|float|int|string $value
     */
    public function __construct($name, $value)
    {
        $this->name = mb_strtoupper($name);

        if (!is_scalar($value)) {
            throw new InvalidArgumentException('The constant needs to have a scalar value');
        }
        $this->value = $value;
    }

    /**
     * @param ConstantDataTransferObject $constantDataTransferObject
     *
     * @return self
     */
    public static function fromDataTransferObject(ConstantDataTransferObject $constantDataTransferObject)
    {
        return new self($constantDataTransferObject->name, $constantDataTransferObject->value);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool|float|int|string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return bool|float|int|string
     */
    public function getValueForTemplate()
    {
        if (is_string($this->value)) {
            return '\'' . $this->value . '\'';
        }

        if (is_bool($this->value)) {
            return $this->value ? 'true' : 'false';
        }

        return $this->value;
    }

    /**
     * @return string
     */
    public function getType()
    {
        // for historical reasons "double" is returned in case of a float,
        // and not simply "float" from the function gettype.
        // we make sure we return float instead of double :)
        return str_replace('double', 'float', gettype($this->getValue()));
    }
}
