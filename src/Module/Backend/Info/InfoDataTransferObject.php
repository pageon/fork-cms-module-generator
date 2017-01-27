<?php

namespace ModuleGenerator\Module\Backend\Info;

use ModuleGenerator\PhpGenerator\ModuleName\ModuleNameDataTransferObject;
use vierbergenlars\SemVer\version;

final class InfoDataTransferObject
{
    /** @var ModuleNameDataTransferObject */
    public $moduleName;

    /** @var version */
    public $moduleVersion;

    /** @var version */
    public $minimumForkVersion;

    /** @var string */
    public $moduleDescription;

    /** @var Info|null */
    private $infoClass;

    public function hasExistingInfo(): bool
    {
        return $this->infoClass instanceof Info;
    }

    public function getInfoClass(): Info
    {
        return $this->infoClass;
    }
}
