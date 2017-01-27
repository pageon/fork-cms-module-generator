<?php

namespace ModuleGenerator\CLI\Console\Generate\Domain;

use Matthias\SymfonyConsoleForm\Console\Formatter\Format;
use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Domain\ValueObject\ValueObject as ValueObjectClass;
use ModuleGenerator\Domain\ValueObject\ValueObjectDBALType;
use ModuleGenerator\Domain\ValueObject\ValueObjectType;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;

final class ValueObject extends GenerateCommand
{
    protected function configure()
    {
        parent::configure();

        $this->setName('generate:domain:value-object')
            ->setDescription('Generates a value object');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        $valueObject = ValueObjectClass::fromDataTransferObject($this->getFormData(ValueObjectType::class));
        $this->generateService->generateClass($valueObject, $this->getTargetPhpVersion());

        $generateDBALType = $this->getHelper('question')->ask(
            $input,
            $output,
            new ConfirmationQuestion(
                Format::forQuestion('Generate a DBAL type for the value object?', 'y')
            )
        );

        if ($generateDBALType) {
            $this->generateService->generateClass(
                ValueObjectDBALType::fromValueObject($valueObject),
                $this->getTargetPhpVersion()
            );
        }
    }
}
