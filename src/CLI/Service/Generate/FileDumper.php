<?php

namespace ModuleGenerator\CLI\Service\Generate;

use Symfony\Component\Filesystem\Filesystem;

final class FileDumper implements Dumper
{
    /** @var Filesystem */
    private $fileSystem;

    public function __construct()
    {
        $this->fileSystem = new Filesystem();
    }

    public function dump(string $filename, string $content): void
    {
        $this->fileSystem->dumpFile($filename, $content);
    }
}
