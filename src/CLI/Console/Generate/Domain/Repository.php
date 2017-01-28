<?php

namespace ModuleGenerator\CLI\Console\Generate\Domain;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Domain\Repository\Repository as RepositoryClass;
use ModuleGenerator\Domain\Repository\RepositoryType;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class Repository extends GenerateCommand
{
    protected function configure()
    {
        parent::configure();

        $this->setName('generate:domain:repository')
            ->setDescription('Generates the repository class for an entity');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        $entityClassName = ClassName::fromDataTransferObject($this->getFormData(RepositoryType::class));
        $this->generateService->generateClass(
            RepositoryClass::fromEntityClassName($entityClassName),
            $this->getTargetPhpVersion()
        );
    }
}
