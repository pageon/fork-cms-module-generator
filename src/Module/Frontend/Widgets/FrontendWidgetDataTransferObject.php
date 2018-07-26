<?php

namespace ModuleGenerator\Module\Frontend\Widgets;

use ModuleGenerator\PhpGenerator\ModuleName\ModuleNameDataTransferObject;
use WidgetGenerator\PhpGenerator\WidgetName\WidgetNameDataTransferObject;

final class FrontendWidgetDataTransferObject
{
    /** @var ModuleNameDataTransferObject */
    public $moduleName;

    /** @var WidgetNameDataTransferObject */
    public $widgetName;
}
