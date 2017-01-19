<?php

namespace ModuleGenerator\CLI\Command;

use ModuleGenerator\CLI\Exception\SrcDirectoryNotFound;
use Symfony\Component\Console\Command\Command;

abstract class GenerateCommand extends Command
{
    /** @var string the directory where the command was executed */
    protected $currentWorkingDirectory;

    /** @var string the src directory */
    private $generateDirectory;

    /**
     * @param string $currentWorkingDirectory
     */
    public function __construct($currentWorkingDirectory)
    {
        parent::__construct();
        $this->currentWorkingDirectory = $currentWorkingDirectory;
    }

    /**
     * @throws SrcDirectoryNotFound
     *
     * @return string The src directory
     */
    final protected function getGenerateDirectory()
    {
        if ($this->generateDirectory !== null) {
            return $this->generateDirectory;
        }

        $currentDirectory = $this->currentWorkingDirectory;

        // Is this the src directory? Or any of the above directories?
        while ($currentDirectory !== '/') {
            // Is this the src directory?
            if (basename($currentDirectory) === 'src') {
                return $this->generateDirectory = $currentDirectory;
            }
            // Does this directory contain the src directory?
            if (is_dir($currentDirectory . '/src')) {
                return $this->generateDirectory = $currentDirectory . '/src';
            }

            // Try in the parent directory
            $currentDirectory = dirname($currentDirectory);
        }

        throw SrcDirectoryNotFound::forDirectory($this->currentWorkingDirectory);
    }
}
