<?php

namespace ModuleGenerator\PhpGenerator\Parameter;

use ModuleGenerator\PhpGenerator\ClassName\ClassName;

final class Parameter
{
    /** @var string|ClassName */
    private $type;

    /** @var string */
    private $name;

    /** @var mixed */
    private $defaultValue;

    /** @var bool */
    private $hasDefaultValue = false;

    /** @var bool */
    private $isPassedByReference;

    /**
     * @param ClassName|string $type
     * @param string $name
     * @param bool $isPassedByReference
     */
    public function __construct($type, string $name, bool $isPassedByReference = false)
    {
        $this->type = $type;
        $this->name = $name;
        $this->isPassedByReference = $isPassedByReference;
    }

    /**
     * @return mixed
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    /**
     * @return ClassName|string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isHasDefaultValue(): bool
    {
        return $this->hasDefaultValue;
    }

    /**
     * @return bool
     */
    public function isPassedByReference(): bool
    {
        return $this->isPassedByReference;
    }

    /**
     * @param mixed $defaultValue
     *
     * @return self
     */
    public function setDefaultValue($defaultValue): self
    {
        $this->defaultValue = $defaultValue;
        $this->hasDefaultValue = true;

        return $this;
    }
}
