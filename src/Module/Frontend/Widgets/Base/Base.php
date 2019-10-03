<?php

namespace ModuleGenerator\Module\Frontend\Widgets\Base;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\Module\Frontend\Widgets\FrontendWidgetDataTransferObject;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleName;
use ModuleGenerator\PhpGenerator\PhpNamespace\PhpNamespace;
use ModuleGenerator\PhpGenerator\WidgetName\WidgetName;

final class Base extends GeneratableClass
{
    /** @var ModuleName */
    private $moduleName;

    /** @var ClassName */
    private $className;

    public function __construct(
        ModuleName $moduleName,
        WidgetName $widgetName
    ) {
        $this->moduleName = $moduleName;
        $this->className = new ClassName(
            $widgetName,
            new PhpNamespace('Frontend\\Modules\\' . $this->moduleName->getName() . '\\Widgets')
        );
    }

    public function getModuleName(): ModuleName
    {
        return $this->moduleName;
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public static function fromDataTransferObject(FrontendWidgetDataTransferObject $widgetDataTransferObject): self
    {
        return new self(
            ModuleName::fromDataTransferObject($widgetDataTransferObject->moduleName),
            WidgetName::fromDataTransferObject($widgetDataTransferObject->widgetName)
        );
    }
}
