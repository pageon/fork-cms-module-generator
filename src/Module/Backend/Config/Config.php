<?php

namespace ModuleGenerator\Module\Backend\Config;

use ModuleGenerator\CLI\Service\Generate\GeneratableModuleClass;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\PhpNamespace\PhpNamespace;

final class Config extends GeneratableModuleClass
{
    public function getClassName(): ClassName
    {
        return new ClassName('Config', new PhpNamespace('Backend\\Modules\\' . $this->getModuleName()));
    }
}
