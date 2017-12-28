<?php

namespace ModuleGenerator\Domain\Actions;

use ModuleGenerator\PhpGenerator\ModuleName\ModuleNameDataTransferObject;

final class CRUDActionsDataTransferObject
{
    /** @var ModuleNameDataTransferObject */
    public $moduleName;

    /** @var ClassNameDataTransferObject */
    public $entityClassName;
}
