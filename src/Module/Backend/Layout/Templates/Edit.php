<?php

namespace ModuleGenerator\Module\Backend\Layout\Templates;

use ModuleGenerator\CLI\Service\Generate\GeneratableModuleFile;
use ModuleGenerator\Module\Backend\Actions\CRUDActionsDataTransferObject;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleName;

final class Edit extends GeneratableModuleFile
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
            $this->entityClassName->getName() . 'Edit.html.twig';
    }

    public function getTemplatePath(float $targetPhpVersion): string
    {
        return __DIR__ . '/Edit.html.twig';
    }

    public static function fromDataTransferObject(CRUDActionsDataTransferObject $crudActionsDataTransferObject): self
    {
        return new self(
            ModuleName::fromDataTransferObject($crudActionsDataTransferObject->moduleName),
            ClassName::fromDataTransferObject($crudActionsDataTransferObject->entityClassName)
        );
    }
}
