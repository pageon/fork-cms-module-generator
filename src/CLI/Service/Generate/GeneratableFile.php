<?php

namespace ModuleGenerator\CLI\Service\Generate;

abstract class GeneratableFile
{
    abstract public function getFilePath($targetPhpVersion): string;
    abstract public function getTemplatePath($targetPhpVersion): string;
}
