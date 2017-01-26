<?php

namespace ModuleGenerator\CLI\Service\Generate;

abstract class GeneratableFile
{
    abstract public function getFilePath(float $targetPhpVersion): string;
    abstract public function getTemplatePath(float $targetPhpVersion): string;
}
