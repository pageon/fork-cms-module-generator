<?php

namespace ModuleGenerator\Domain\DataGrid;

use ModuleGenerator\PhpGenerator\ClassName\ClassNameDataTransferObject;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleNameDataTransferObject;

final class DataGridDataTransferObject
{
    /** @var ModuleNameDataTransferObject */
    public $moduleName;

    /** @var ClassNameDataTransferObject */
    public $entityClassName;

    /** @var string */
    public $tableName;
}
