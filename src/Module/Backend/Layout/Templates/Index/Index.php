<?php

namespace ModuleGenerator\Module\Backend\Layout\Templates\Index;

use ModuleGenerator\CLI\Service\Generate\GeneratableModuleFile;
use ModuleGenerator\Module\Backend\Actions\BackendActionDataTransferObject;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleName;

final class Index extends GeneratableModuleFile
{
    /** @var ClassName */
    private $entityClassName;

    public function __construct(ModuleName $moduleName, ClassName $entityClassName)
    {
        parent::__construct($moduleName);
        $this->entityClassName = $entityClassName;
    }

    public function getFilePath(float $targetPhpVersion): string
    {
        return 'Backend/Modules/' . $this->getModuleName() . '/Layout/Templates/' .
            $this->entityClassName->getName() . 'Index.html.twig';
    }

    public function getTemplatePath(float $targetPhpVersion): string
    {
        return __DIR__ . '/Index.html.twig';
    }

    public function getEntityClassName(): ClassName
    {
        return $this->entityClassName;
    }

    public static function fromDataTransferObject(BackendActionDataTransferObject $crudActionsDataTransferObject): self
    {
        return new self(
            ModuleName::fromDataTransferObject($crudActionsDataTransferObject->moduleName),
            ClassName::fromDataTransferObject($crudActionsDataTransferObject->entityClassName)
        );
    }
}
