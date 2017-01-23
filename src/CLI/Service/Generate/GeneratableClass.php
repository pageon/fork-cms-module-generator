<?php
namespace ModuleGenerator\CLI\Service\Generate;

use ModuleGenerator\PhpGenerator\ClassName\ClassName;

abstract class GeneratableClass
{
    abstract public function getClassName(): ClassName;

    public function getTemplatePath(): string
    {
        return realpath(
            __DIR__ . '/../../../' . preg_replace(
                '/^ModuleGenerator/',
                '',
                str_replace('\\', '/', static::class) . '.html.twig'
            )
        );
    }
}
