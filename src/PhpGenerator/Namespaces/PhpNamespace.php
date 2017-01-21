<?php

namespace ModuleGenerator\PhpGenerator\Namespaces;

use Nette\PhpGenerator\PhpNamespace as NettePhpNamespace;

final class PhpNamespace extends NettePhpNamespace
{
    /**
     * @param NamespaceDataTransferObject $namespaceDataTransferObject
     *
     * @return PhpNamespace
     */
    public static function fromDataTransferObject(NamespaceDataTransferObject $namespaceDataTransferObject)
    {
        return new self($namespaceDataTransferObject->name);
    }
}
