<?php

namespace ModuleGenerator\Module\Backend\Resources\Config\Doctrine;

use ModuleGenerator\CLI\Service\Generate\GeneratableModuleFile;
use ModuleGenerator\Domain\Entity\Entity;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleName;

final class Doctrine extends GeneratableModuleFile
{
    /** @var Entity[] */
    private $entities;

    public function __construct(ModuleName $moduleName, array $entities = [], bool $append = false)
    {
        parent::__construct($moduleName, $append);

        $this->entities = $entities;
    }

    public function getFilePath(float $targetPhpVersion): string
    {
        return 'Backend/Modules/' . $this->getModuleName() . '/Resources/config/doctrine.yml';
    }

    public function getTemplatePath(float $targetPhpVersion): string
    {
        return __DIR__ . '/doctrine.yml.twig';
    }

    public function getEntities(): array
    {
        return $this->entities;
    }
}
