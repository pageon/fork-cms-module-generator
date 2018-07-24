<?php

namespace ModuleGenerator\CLI\Service\Generate;

use ModuleGenerator\CLI\Exception\NonComplyingModuleName;
use ModuleGenerator\CLI\Exception\SourceDirectoryNotFound;
use ModuleGenerator\Domain\ServiceConfiguration\CommandHandlerServiceConfiguration;
use Symfony\Bundle\TwigBundle\TwigEngine;

final class Generate
{
    /** @var string the directory where the command was executed */
    protected $currentWorkingDirectory;

    /** @var string the src directory */
    private $generateDirectory;

    /** @var TwigEngine */
    private $templating;

    /** @var Dumper */
    private $dumper;

    /** @var Appender */
    private $appender;

    public function __construct(TwigEngine $templating, Dumper $dumper, Appender $appender)
    {
        $this->currentWorkingDirectory = getcwd();
        $this->templating = $templating;
        $this->dumper = $dumper;
        $this->appender = $appender;
    }

    /**
     * @throws SourceDirectoryNotFound
     */
    protected function getGenerateDirectory()
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

        throw SourceDirectoryNotFound::forDirectory($this->currentWorkingDirectory);
    }

    public function generateClasses(array $classes, float $targetPhpVersion): void
    {
        array_map(
            function (GeneratableClass $class) use ($targetPhpVersion) {
                $fileDirectory = DIRECTORY_SEPARATOR . str_replace(
                    '\\',
                    DIRECTORY_SEPARATOR,
                    $class->getClassName()->getNamespace()->getName()
                );
                $filename = $fileDirectory . DIRECTORY_SEPARATOR . $class->getClassName()->getName() . '.php';

                $this->dumper->dump(
                    $this->getGenerateDirectory() . $filename,
                    $this->templating->render($class->getTemplatePath($targetPhpVersion), ['class' => $class])
                );
            },
            $classes
        );
    }

    public function generateFiles(array $files, float $targetPhpVersion): void
    {
        array_map(
            function (GeneratableFile $file) use ($targetPhpVersion) {
                $this->dumper->dump(
                    $this->getGenerateDirectory() . '/' . $file->getFilePath($targetPhpVersion),
                    $this->templating->render($file->getTemplatePath($targetPhpVersion), ['file' => $file]),
                    $file->isAppend(),
                    $file->getTemplatePath($targetPhpVersion) . 'original'
                );
            },
            $files
        );
    }

    public function generateClass(GeneratableClass $class, float $targetPhpVersion): void
    {
        $this->generateClasses([$class], $targetPhpVersion);
    }

    public function generateFile(GeneratableFile $file, float $targetPhpVersion): void
    {
        $this->generateFiles([$file], $targetPhpVersion);
    }

    public function generateCommandServiceConfiguration(
        CommandHandlerServiceConfiguration $commandHandlerServiceConfiguration,
        float $targetPhpVersion
    ): void {
        $this->appender->append(
            $this->getGenerateDirectory() . DIRECTORY_SEPARATOR .
            $commandHandlerServiceConfiguration->getModulePath() . DIRECTORY_SEPARATOR .
            'Resources' . DIRECTORY_SEPARATOR .
            'config' . DIRECTORY_SEPARATOR .
            'commands.yml',
            $this->templating->render(
                $commandHandlerServiceConfiguration->getTemplatePath($targetPhpVersion),
                ['service' => $commandHandlerServiceConfiguration]
            )
        );
    }
}
