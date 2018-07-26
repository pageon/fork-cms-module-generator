<?php

namespace WidgetGenerator\PhpGenerator\WidgetName;

final class WidgetNameDataTransferObject
{
    /** @var string */
    public $name;

    /** @var WidgetName|null */
    private $widgetNameClass;

    public function __construct(WidgetName $widgetName = null)
    {
        $this->widgetNameClass = $widgetName;

        if (!$this->widgetNameClass instanceof WidgetName) {
            return;
        }

        $this->name = $this->widgetNameClass->getName();
    }

    public function hasExistingWidgetName(): bool
    {
        return $this->widgetNameClass instanceof WidgetName;
    }

    public function getWidgetNameClass(): WidgetName
    {
        return $this->widgetNameClass;
    }
}
