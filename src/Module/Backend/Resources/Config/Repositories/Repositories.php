<?php

namespace ModuleGenerator\Module\Backend\Resources\Config\Repositories;

use ModuleGenerator\CLI\Service\Generate\GeneratableModuleFile;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleName;

final class Repositories extends GeneratableModuleFile
{
    /** @var array */
    private $repositories;

    public function __construct(ModuleName $moduleName, array $repositories = [], bool $append = false)
    {
        parent::__construct($moduleName, $append);

        $this->repositories = $repositories;
    }

    public function getFilePath(float $targetPhpVersion): string
    {
        return 'Backend/Modules/' . $this->getModuleName() . '/Resources/config/repositories.yml';
    }

    public function getTemplatePath(float $targetPhpVersion): string
    {
        return __DIR__ . '/repositories.yml.twig';
    }

    public function getRepositories(): array
    {
        return $this->repositories;
    }
}
