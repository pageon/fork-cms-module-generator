<?php

namespace ModuleGenerator\Module\Frontend\Widgets;

use WidgetGenerator\PhpGenerator\WidgetName\WidgetName;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleNameDataTransferObject;

final class FrontendWidgetDataTransferObject
{
    /** @var ModuleNameDataTransferObject */
    public $moduleName;

    /** @var WidgetName */
    public $widgetName;
}
