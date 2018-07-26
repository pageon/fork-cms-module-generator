<?php

namespace ModuleGenerator\Module\Frontend\Layout\Templates\Index;

use ModuleGenerator\CLI\Service\Generate\GeneratableModuleFile;
use ModuleGenerator\Module\Frontend\Actions\FrontendActionDataTransferObject;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleName;
use ModuleGenerator\PhpGenerator\ActionName\ActionName;

final class Index extends GeneratableModuleFile
{
    /** @var ActionName */
    private $actionName;

    /** @var ClassName */
    private $entityClassName;

    public function __construct(ModuleName $moduleName, ClassName $entityClassName, ActionName $actionName)
    {
        parent::__construct($moduleName);
        $this->actionName = $actionName;
        $this->entityClassName = $entityClassName;
    }

    public function getFilePath(float $targetPhpVersion): string
    {
        return 'Frontend/Modules/' . $this->getModuleName() . '/Layout/Templates/' . $this->actionName . '.html.twig';
    }

    public function getActionName(): ActionName
    {
        return $this->actionName;
    }

    public function getEntityClassName(): ClassName
    {
        return $this->entityClassName;
    }

    public function getTemplatePath(float $targetPhpVersion): string
    {
        return __DIR__ . '/Index.html.twig';
    }

    public static function fromDataTransferObject(FrontendActionDataTransferObject $frontendActionDataTransferObject): self
    {
        return new self(
            ModuleName::fromDataTransferObject($frontendActionDataTransferObject->moduleName),
            ClassName::fromDataTransferObject($frontendActionDataTransferObject->entityClassName),
            ActionName::fromDataTransferObject($frontendActionDataTransferObject->actionName)
        );
    }
}
