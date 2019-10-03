<?php

namespace ModuleGenerator;

use ModuleGenerator\DependencyInjection\ModuleGeneratorExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class ModuleGeneratorBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new ModuleGeneratorExtension();
    }
}
