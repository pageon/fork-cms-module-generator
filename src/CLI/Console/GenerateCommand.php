<?php

namespace ModuleGenerator\CLI\Console;

use ModuleGenerator\CLI\Exception\SrcDirectoryNotFound;
use Nette\PhpGenerator\ClassType;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;

abstract class GenerateCommand extends Command
{
    /** @var string the directory where the command was executed */
    protected $currentWorkingDirectory;

    /** @var string the src directory */
    private $generateDirectory;

    /** @var InputInterface */
    private $input;

    /** @var OutputInterface */
    private $output;

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

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;
    }

    /**
     * @param string $className
     *
     * @return mixed
     */
    public function getFormData($className)
    {
        $formHelper = $this->getHelper('form');

        return $formHelper->interactUsingForm($className, $this->input, $this->output);
    }

    protected function generateClass(ClassType $class)
    {
        $filename = str_replace('\\', '/', $class->getNamespace()->getName()) . '/' . $class->getName() . '.php';
        $fileSystem = new Filesystem();

        $fileSystem->dumpFile(
            $this->getGenerateDirectory() . $filename,
            sprintf('<?php'.PHP_EOL.PHP_EOL.$class->getNamespace().$class)
        );
    }
}
