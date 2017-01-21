<?php

namespace ModuleGenerator\PhpGenerator\PhpNamespace;

final class PHPNamespace
{
    /** @var string */
    private $name;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        // remove leading or trailing backslashes, the trim function didn't work for this and returned an empty string.
        $this->name = preg_replace('/(^\\\\)||(\\\\$)/', '', $name);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return PHPNamespace
     */
    public static function root()
    {
        return new self('');
    }

    /**
     * @return bool
     */
    public function isRoot()
    {
        return $this->name === '';
    }

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
