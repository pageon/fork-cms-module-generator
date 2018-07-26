<?php

namespace ModuleGenerator\Module\Frontend\Actions;

use ModuleGenerator\PhpGenerator\ActionName\ActionNameDataTransferObject;
use ModuleGenerator\PhpGenerator\ClassName\ClassNameDataTransferObject;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleNameDataTransferObject;

final class FrontendActionDataTransferObject
{
    /** @var ModuleNameDataTransferObject */
    public $moduleName;

    /** @var ClassNameDataTransferObject */
    public $entityClassName;

    /** @var ActionNameDataTransferObject */
    public $actionName;
}
