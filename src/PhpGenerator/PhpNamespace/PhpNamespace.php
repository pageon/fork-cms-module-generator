<?php

namespace ModuleGenerator\PhpGenerator\PhpNamespace;

final class PhpNamespace
{
    /** @var string */
    private $name;

    public function __construct(string $name)
    {
        // remove leading or trailing backslashes, the trim function didn't work for this and returned an empty string.
        $this->name = preg_replace('/(^\\\\)||(\\\\$)/', '', $name);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public static function root(): self
    {
        return new self('');
    }

    public function isRoot(): bool
    {
        return $this->name === '';
    }

    public static function fromDataTransferObject(
        PhpNamespaceDataTransferObject $phpNamespaceDataTransferObject
    ): self {
        if ($phpNamespaceDataTransferObject->hasExistingPhpNamespace()) {
            $phpNamespaceDataTransferObject->getPhpNamespaceClass()->name = $phpNamespaceDataTransferObject->name;

            return $phpNamespaceDataTransferObject->getPhpNamespaceClass();
        }

        return new self($phpNamespaceDataTransferObject->name);
    }
}
