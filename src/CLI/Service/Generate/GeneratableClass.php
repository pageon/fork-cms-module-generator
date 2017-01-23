<?php
namespace ModuleGenerator\CLI\Service\Generate;

use ModuleGenerator\PhpGenerator\ClassName\ClassName;

interface GeneratableClass
{
    public function getClassName(): ClassName;
}
