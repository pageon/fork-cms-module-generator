<?php

namespace ModuleGenerator\PhpGenerator\Constant;

final class Constant
{
    /** @var string */
    private $name;

    /** @var mixed */
    private $value;

    public function __construct(string $name, $value)
    {
        $this->name = mb_strtoupper($name);
        $this->value = $this->castToCorrectType($value);
    }

    public static function fromDataTransferObject(
        ConstantDataTransferObject $constantDataTransferObject
    ): self {
        if ($constantDataTransferObject->hasExistingConstant()) {
            $value = $constantDataTransferObject->getConstantClass()->castToCorrectType(
                $constantDataTransferObject->value
            );
            $constantDataTransferObject->getConstantClass()->name = $constantDataTransferObject->name;
            $constantDataTransferObject->getConstantClass()->value = $value;

            return $constantDataTransferObject->getConstantClass();
        }

        return new self($constantDataTransferObject->name, $constantDataTransferObject->value);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getType(): string
    {
        // for historical reasons "double" is returned in case of a float,
        // and not simply "float" from the function gettype.
        // we make sure we return float instead of double :)
        return str_replace('double', 'float', gettype($this->getValue()));
    }

    /**
     * @param mixed $value
     *
     * @return mixed
     */
    private function castToCorrectType($value)
    {
        if ($value === 'true' || $value === 'false') {
            return $value === 'true';
        }

        if (!is_numeric($value)) {
            return $value;
        }

        if ($value == (int) $value) {
            return (int) $value;
        }

        if ($value == (float) $value) {
            return (float) $value;
        }

        return $value;
    }

    /**
     * @return mixed
     */
    public function getValueForTemplate()
    {
        switch (true) {
            case is_null($this->value):
                return 'null';
            case is_string($this->value):
                return '\'' . $this->value . '\'';
            case is_bool($this->value):
                return $this->value ? 'true' : 'false';
            default:
                return $this->value;
        }
    }
}
