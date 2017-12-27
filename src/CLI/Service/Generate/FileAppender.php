<?php

namespace ModuleGenerator\CLI\Service\Generate;

use Symfony\Component\Filesystem\Filesystem;

final class FileAppender implements Appender
{
    /** @var Filesystem */
    private $filesystem;

    public function __construct()
    {
        $this->filesystem = new Filesystem();
    }

    public function append(string $filename, string $content): void
    {
        $this->filesystem->appendToFile($filename, $content);
    }
}
