<?php

namespace ModuleGenerator\PhpGenerator\ActionName;

final class ActionNameDataTransferObject
{
    /** @var string */
    public $name;

    /** @var ActionName|null */
    private $actionNameClass;

    public function __construct(ActionName $actionName = null)
    {
        $this->actionNameClass = $actionName;

        if (!$this->actionNameClass instanceof ActionName) {
            return;
        }

        $this->name = $this->actionNameClass->getName();
    }

    public function hasExistingActionName(): bool
    {
        return $this->actionNameClass instanceof ActionName;
    }

    public function getActionNameClass(): ActionName
    {
        return $this->actionNameClass;
    }
}
