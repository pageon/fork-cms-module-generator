<?php

namespace ModuleGenerator\Domain\Command;

use ModuleGenerator\PhpGenerator\ClassName\ClassNameDataTransferObject;
use ModuleGenerator\PhpGenerator\PhpNamespace\PhpNamespaceDataTransferObject;

final class CRUDCommandDataTransferObject
{
    /** @var PhpNamespaceDataTransferObject */
    public $commandNamespace;

    /** @var ClassNameDataTransferObject */
    public $entityClassName;
}
