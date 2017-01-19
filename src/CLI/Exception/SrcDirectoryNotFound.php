<?php

namespace ModuleGenerator\CLI\Exception;

use Exception;

final class SrcDirectoryNotFound extends Exception
{
    /**
     * @param string $directory
     *
     * @return SrcDirectoryNotFound
     */
    public static function forDirectory($directory)
    {
        return new self('No src directory found in: ' . $directory);
    }
}
