<?php

namespace ModuleGenerator\PhpGenerator\Parameter;

use ModuleGenerator\PhpGenerator\ParameterType\DBALType;

final class Parameter
{
    /** @var string */
    private $name;

    /** @var DBALType */
    private $dbalType;

    /** @var bool */
    private $nullable;

    public function __construct($name, DBALType $dbalType, $nullable)
    {
        $this->name = $name;
        $this->dbalType = $dbalType;
        $this->nullable = $nullable;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDbalType(): DBALType
    {
        return $this->dbalType;
    }

    public function getDbalTypeName(): string
    {
        if ($this->dbalType->isImage() || $this->dbalType->isFile()) {
            return mb_strtolower($this->name);
        }

        return $this->dbalType;
    }

    public function isNullable(): bool
    {
        return $this->nullable;
    }

    public function getForFunction(): string
    {
        return ucfirst($this->getName());
    }

    public static function fromDataTransferObject(ParameterDataTransferObject $parameterDataTransferObject): self
    {
        return new self(
            $parameterDataTransferObject->name,
            $parameterDataTransferObject->dbalType,
            $parameterDataTransferObject->nullable
        );
    }
}
