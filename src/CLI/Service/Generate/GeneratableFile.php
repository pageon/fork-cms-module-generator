<?php

namespace ModuleGenerator\CLI\Service\Generate;

abstract class GeneratableFile
{
    /** @var bool */
    private $append = false;

    public function __construct(bool $append)
    {
        $this->append = $append;
    }

    public function isAppend(): bool
    {
        return $this->append;
    }

    abstract public function getFilePath(float $targetPhpVersion): string;
    abstract public function getTemplatePath(float $targetPhpVersion): string;
}
