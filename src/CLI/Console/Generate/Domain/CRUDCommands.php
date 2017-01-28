<?php

namespace ModuleGenerator\CLI\Console\Generate\Domain;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Domain\Command\Create\CreateCommand;
use ModuleGenerator\Domain\Command\Create\CreateCommandHandler;
use ModuleGenerator\Domain\Command\CRUDCommandsType;
use ModuleGenerator\Domain\Command\Delete\DeleteCommand;
use ModuleGenerator\Domain\Command\Delete\DeleteCommandHandler;
use ModuleGenerator\Domain\Command\Update\UpdateCommand;
use ModuleGenerator\Domain\Command\Update\UpdateCommandHandler;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class CRUDCommands extends GenerateCommand
{
    protected function configure()
    {
        parent::configure();

        $this->setName('generate:domain:crud-commands')
            ->setDescription('Generates the create, update and delete commands for an entity with their handlers');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        $CRUDCommandsDataTransferObject = $this->getFormData(CRUDCommandsType::class);
        $this->generateService->generateClass(
            CreateCommand::fromDataTransferObject($CRUDCommandsDataTransferObject),
            $this->getTargetPhpVersion()
        );
        $this->generateService->generateClass(
            CreateCommandHandler::fromDataTransferObject($CRUDCommandsDataTransferObject),
            $this->getTargetPhpVersion()
        );
        $this->generateService->generateClass(
            DeleteCommand::fromDataTransferObject($CRUDCommandsDataTransferObject),
            $this->getTargetPhpVersion()
        );
        $this->generateService->generateClass(
            DeleteCommandHandler::fromDataTransferObject($CRUDCommandsDataTransferObject),
            $this->getTargetPhpVersion()
        );
        $this->generateService->generateClass(
            UpdateCommand::fromDataTransferObject($CRUDCommandsDataTransferObject),
            $this->getTargetPhpVersion()
        );
        $this->generateService->generateClass(
            UpdateCommandHandler::fromDataTransferObject($CRUDCommandsDataTransferObject),
            $this->getTargetPhpVersion()
        );
    }
}
