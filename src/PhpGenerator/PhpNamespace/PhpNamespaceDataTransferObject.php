<?php

namespace ModuleGenerator\PhpGenerator\PhpNamespace;

final class PhpNamespaceDataTransferObject
{
    /** @var string */
    public $name;

    /** @var PhpNamespace */
    private $phpNamespaceClass;

    public function __construct(PhpNamespace $phpNamespace = null)
    {
        $this->phpNamespaceClass = $phpNamespace;

        if (!$this->phpNamespaceClass instanceof PhpNamespace) {
            return;
        }

        $this->name = $this->phpNamespaceClass->getName();
    }
}
