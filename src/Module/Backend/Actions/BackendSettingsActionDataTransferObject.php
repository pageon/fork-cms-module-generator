<?php

namespace ModuleGenerator\Module\Backend\Actions;

use ModuleGenerator\PhpGenerator\ClassName\ClassNameDataTransferObject;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleNameDataTransferObject;

final class BackendSettingsActionDataTransferObject
{
    /** @var ModuleNameDataTransferObject */
    public $moduleName;

    /** @var ClassNameDataTransferObject */
    public $settingClassName;
}
