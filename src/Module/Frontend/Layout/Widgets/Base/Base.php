<?php

namespace ModuleGenerator\Module\Frontend\Layout\Widgets\Base;

use ModuleGenerator\CLI\Service\Generate\GeneratableModuleFile;
use ModuleGenerator\Module\Frontend\Widgets\FrontendWidgetDataTransferObject;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleName;
use ModuleGenerator\PhpGenerator\WidgetName\WidgetName;

final class Base extends GeneratableModuleFile
{
    /** @var WidgetName */
    private $widgetName;

    public function __construct(ModuleName $moduleName, WidgetName $widgetName)
    {
        parent::__construct($moduleName);
        $this->widgetName = $widgetName;
    }

    public function getFilePath(float $targetPhpVersion): string
    {
        return 'Frontend/Modules/' . $this->getModuleName() . '/Layout/Widgets/' . $this->widgetName . '.html.twig';
    }

    public function getWidgetName(): WidgetName
    {
        return $this->widgetName;
    }

    public function getTemplatePath(float $targetPhpVersion): string
    {
        return __DIR__ . '/Base.html.twig';
    }

    public static function fromDataTransferObject(FrontendWidgetDataTransferObject $frontendWidgetDataTransferObject): self
    {
        return new self(
            ModuleName::fromDataTransferObject($frontendWidgetDataTransferObject->moduleName),
            WidgetName::fromDataTransferObject($frontendWidgetDataTransferObject->widgetName)
        );
    }
}
