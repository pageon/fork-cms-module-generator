<?php

namespace ModuleGenerator\PhpGenerator\Constant;

final class ConstantDataTransferObject
{
    /** @var string */
    public $name;

    /** @var mixed */
    public $value;

    /** @var Constant|null */
    private $constantClass;

    public function __construct(Constant $constant = null)
    {
        $this->constantClass = $constant;

        if (!$this->constantClass instanceof Constant) {
            return;
        }

        $this->name = $this->constantClass->getName();
        $this->value = $this->constantClass->getValue();

        if (is_bool($this->value)) {
            $this->value = $this->value ? 'true' : 'false';
        }
    }

    public function hasExistingConstant(): bool
    {
        return $this->constantClass instanceof Constant;
    }

    public function getConstantClass(): Constant
    {
        return $this->constantClass;
    }
}
