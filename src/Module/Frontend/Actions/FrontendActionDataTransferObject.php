<?php

namespace ModuleGenerator\Module\Frontend\Actions;

use ActionGenerator\PhpGenerator\ActionName\ActionName;
use ModuleGenerator\PhpGenerator\ClassName\ClassNameDataTransferObject;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleNameDataTransferObject;

final class FrontendActionDataTransferObject
{
    /** @var ModuleNameDataTransferObject */
    public $moduleName;

    /** @var ClassNameDataTransferObject */
    public $entityClassName;

    /** @var ActionName */
    public $actionName;
}
