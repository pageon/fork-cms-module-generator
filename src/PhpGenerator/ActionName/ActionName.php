<?php

namespace ModuleGenerator\PhpGenerator\ActionName;

final class ActionName
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
        ActionNameDataTransferObject $actionNameDataTransferObject
    ): self {
        if ($actionNameDataTransferObject->hasExistingActionName()) {
            $actionNameDataTransferObject->getActionNameClass()->name = ucfirst($actionNameDataTransferObject->name);

            return $actionNameDataTransferObject->getActionNameClass();
        }

        return new self(
            $actionNameDataTransferObject->name
        );
    }
}
