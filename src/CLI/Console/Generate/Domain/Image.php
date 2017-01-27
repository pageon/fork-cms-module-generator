<?php

namespace ModuleGenerator\CLI\Console\Generate\Domain;

use Matthias\SymfonyConsoleForm\Console\Formatter\Format;
use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Domain\Image\Image as ImageClass;
use ModuleGenerator\Domain\Image\ImageDBALType;
use ModuleGenerator\Domain\Image\ImageType;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;

final class Image extends GenerateCommand
{
    protected function configure()
    {
        parent::configure();

        $this->setName('generate:domain:image')
            ->setDescription('Generates a image');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        $image = ImageClass::fromDataTransferObject($this->getFormData(ImageType::class));
        $this->generateService->generateClass($image, $this->getTargetPhpVersion());

        $generateDBALType = $this->getHelper('question')->ask(
            $input,
            $output,
            new ConfirmationQuestion(
                Format::forQuestion('Generate a DBAL type for the image?', 'y')
            )
        );

        if ($generateDBALType) {
            $this->generateService->generateClass(
                ImageDBALType::fromImage($image),
                $this->getTargetPhpVersion()
            );
        }
    }
}
