<?php

namespace ModuleGenerator\PhpGenerator\ModuleName;

final class ModuleName
{
    /** @var string */
    private $name;

    public function __construct(string $name)
    {
        $this->name = ucfirst($name);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function __toString(): string
    {
        return $this->getName();
    }

    public static function fromDataTransferObject(
        ModuleNameDataTransferObject $moduleNameDataTransferObject
    ): self {
        if ($moduleNameDataTransferObject->hasExistingModuleName()) {
            $moduleNameDataTransferObject->getModuleNameClass()->name = ucfirst($moduleNameDataTransferObject->name);

            return $moduleNameDataTransferObject->getModuleNameClass();
        }

        return new self(
            $moduleNameDataTransferObject->name
        );
    }
}
