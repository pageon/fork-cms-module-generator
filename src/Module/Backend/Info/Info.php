<?php

namespace ModuleGenerator\Module\Backend\Info;

use ModuleGenerator\CLI\Service\Generate\GeneratableModuleFile;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleName;
use vierbergenlars\SemVer\version;

final class Info extends GeneratableModuleFile
{
    /** @var version */
    private $moduleVersion;

    /** @var version */
    private $minimumForkVersion;

    /** @var string */
    private $moduleDescription;

    public function __construct(
        ModuleName $moduleName,
        version $moduleVersion,
        version $minimumForkVersion,
        $moduleDescription
    ) {
        parent::__construct($moduleName);

        $this->moduleVersion = $moduleVersion;
        $this->minimumForkVersion = $minimumForkVersion;
        $this->moduleDescription = $moduleDescription;
    }

    public function getModuleVersion(): version
    {
        return $this->moduleVersion;
    }

    public function getMinimumForkVersion(): version
    {
        return $this->minimumForkVersion;
    }

    public function getModuleDescription(): string
    {
        return $this->moduleDescription;
    }

    public function getFilePath(float $targetPhpVersion): string
    {
        return 'Backend/Modules/' . $this->getModuleName() . '/info.xml';
    }

    public function getTemplatePath(float $targetPhpVersion): string
    {
        return __DIR__ . '/info.xml.twig';
    }
}
