<?php

namespace ModuleGenerator\Module\Backend\Installer\Installer;

use ModuleGenerator\CLI\Service\Generate\GeneratableModuleClass;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\PhpNamespace\PhpNamespace;

final class Installer extends GeneratableModuleClass
{
    public function getClassName(): ClassName
    {
        return new ClassName(
            'Installer',
            new PhpNamespace('Backend\\Modules\\' . $this->getModuleName() . '\\Installer')
        );
    }
}
