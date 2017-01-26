<?php

namespace ModuleGenerator\Module\Backend\DependencyInjection\ModuleExtension;

use ModuleGenerator\CLI\Service\Generate\GeneratableModuleClass;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\PhpNamespace\PhpNamespace;

final class ModuleExtension extends GeneratableModuleClass
{
    public function getClassName(): ClassName
    {
        return new ClassName(
            $this->getModuleName() . 'Extension',
            new PhpNamespace('Backend\\Modules\\' . $this->getModuleName() . '\\DependencyInjection')
        );
    }
}
