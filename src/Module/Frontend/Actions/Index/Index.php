<?php

namespace ModuleGenerator\Module\Frontend\Actions\Index;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\Module\Frontend\Actions\FrontendActionDataTransferObject;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleName;
use ModuleGenerator\PhpGenerator\PhpNamespace\PhpNamespace;
use ModuleGenerator\PhpGenerator\ActionName\ActionName;

final class Index extends GeneratableClass
{
    /** @var ModuleName */
    private $moduleName;

    /** @var ClassName */
    private $className;

    /** @var ClassName */
    private $entityClassName;

    public function __construct(
        ModuleName $moduleName,
        ClassName $entityClassName,
        ActionName $actionName
    ) {
        $this->moduleName = $moduleName;
        $this->entityClassName = $entityClassName;
        $this->className = new ClassName(
            $actionName,
            new PhpNamespace('Frontend\\Modules\\' . $this->moduleName->getName() . '\\Actions')
        );
    }

    public function getModuleName(): ModuleName
    {
        return $this->moduleName;
    }

    public function getEntityClassName(): ClassName
    {
        return $this->entityClassName;
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public static function fromDataTransferObject(FrontendActionDataTransferObject $actionDataTransferObject): self
    {
        return new self(
            ModuleName::fromDataTransferObject($actionDataTransferObject->moduleName),
            ClassName::fromDataTransferObject($actionDataTransferObject->entityClassName),
            ActionName::fromDataTransferObject($actionDataTransferObject->actionName)
        );
    }
}
