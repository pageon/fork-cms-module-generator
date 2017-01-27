<?php

namespace ModuleGenerator\CLI\Console\Generate\Domain;

use Matthias\SymfonyConsoleForm\Console\Formatter\Format;
use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Domain\File\File as FileClass;
use ModuleGenerator\Domain\File\FileDBALType;
use ModuleGenerator\Domain\File\FileType;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;

final class File extends GenerateCommand
{
    protected function configure()
    {
        parent::configure();

        $this->setName('generate:domain:file')
            ->setDescription('Generates a file');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        $file = FileClass::fromDataTransferObject($this->getFormData(FileType::class));
        $this->generateService->generateClass($file, $this->getTargetPhpVersion());

        $generateDBALType = $this->getHelper('question')->ask(
            $input,
            $output,
            new ConfirmationQuestion(
                Format::forQuestion('Generate a DBAL type for the file?', 'y')
            )
        );

        if ($generateDBALType) {
            $this->generateService->generateClass(
                FileDBALType::fromFile($file),
                $this->getTargetPhpVersion()
            );
        }
    }
}
