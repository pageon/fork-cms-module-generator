<?php

namespace ModuleGenerator\CLI\Service\Generate;

use ModuleGenerator\PhpGenerator\ClassName\ClassName;

abstract class GeneratableClass
{
    abstract public function getClassName(): ClassName;

    public function getTemplatePath($targetPhpVersion): string
    {
        return realpath(
            __DIR__ . '/../../../' . preg_replace(
                '/^ModuleGenerator/',
                '',
                str_replace('\\', '/', static::class) . '.php' . $targetPhpVersion * 10 . '.php.twig'
            )
        );
    }
}
