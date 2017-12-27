<?php

namespace ModuleGenerator\CLI\Exception;

use Exception;

final class SourceDirectoryNotFound extends Exception
{
    private function __construct(string $message) {
        return new parent($message);
    }

    public static function forDirectory(string $directory): self
    {
        return new self('No src directory found in: ' . $directory);
    }
}
