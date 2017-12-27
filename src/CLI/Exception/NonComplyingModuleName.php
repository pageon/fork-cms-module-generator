<?php

namespace ModuleGenerator\CLI\Exception;

use Exception;

final class NonComplyingModuleName extends Exception
{
    private function __construct(string $message) {
        return new parent($message);
    }

    public static function forName(string $name): self
    {
        return new self('Module name is not correct: ' . $name);
    }
}
