<?php

namespace ModuleGenerator\CLI\Console\Generate\Domain;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\CLI\Service\Generate\GeneratableClass;
use ModuleGenerator\Domain\Command\Create\CreateCommand;
use ModuleGenerator\Domain\Command\Create\CreateCommandHandler;
use ModuleGenerator\Domain\Command\CRUDCommandDataTransferObject;
use ModuleGenerator\Domain\Command\CRUDCommandsType;
use ModuleGenerator\Domain\Command\Delete\DeleteCommand;
use ModuleGenerator\Domain\Command\Delete\DeleteCommandHandler;
use ModuleGenerator\Domain\Command\Update\UpdateCommand;
use ModuleGenerator\Domain\Command\Update\UpdateCommandHandler;
use ModuleGenerator\Domain\ServiceConfiguration\CommandHandlerServiceConfiguration;
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

        $this->generateCreateCommandComponents($CRUDCommandsDataTransferObject);

        $this->generateDeleteCommandComponents($CRUDCommandsDataTransferObject);

        $this->generateUpdateCommandComponents($CRUDCommandsDataTransferObject);
    }

    /**
     * @return mixed
     */
    private function generateCreateCommandComponents(
        CRUDCommandDataTransferObject $CRUDCommandsDataTransferObject
    ): void {
        $createCommand = CreateCommand::fromDataTransferObject($CRUDCommandsDataTransferObject);
        $this->generateService->generateClass(
            $createCommand,
            $this->getTargetPhpVersion()
        );

        $createCommandHandler = CreateCommandHandler::fromDataTransferObject($CRUDCommandsDataTransferObject);
        $this->generateService->generateClass(
            $createCommandHandler,
            $this->getTargetPhpVersion()
        );

        $this->generateCommandHandlerConfiguration($createCommandHandler, $createCommand);
    }

    private function generateDeleteCommandComponents(
        CRUDCommandDataTransferObject $CRUDCommandsDataTransferObject
    ): void {
        $deleteCommand = DeleteCommand::fromDataTransferObject($CRUDCommandsDataTransferObject);
        $this->generateService->generateClass(
            $deleteCommand,
            $this->getTargetPhpVersion()
        );

        $deleteCommandHandler = DeleteCommandHandler::fromDataTransferObject($CRUDCommandsDataTransferObject);
        $this->generateService->generateClass(
            $deleteCommandHandler,
            $this->getTargetPhpVersion()
        );

        $this->generateCommandHandlerConfiguration($deleteCommandHandler, $deleteCommand);
    }

    protected function generateUpdateCommandComponents(
        CRUDCommandDataTransferObject $CRUDCommandsDataTransferObject
    ): void {
        $updateCommand = UpdateCommand::fromDataTransferObject($CRUDCommandsDataTransferObject);
        $this->generateService->generateClass(
            $updateCommand,
            $this->getTargetPhpVersion()
        );

        $updateCommandHandler = UpdateCommandHandler::fromDataTransferObject($CRUDCommandsDataTransferObject);
        $this->generateService->generateClass(
            $updateCommandHandler,
            $this->getTargetPhpVersion()
        );

        $this->generateCommandHandlerConfiguration($updateCommandHandler, $updateCommand);
    }

    private function generateCommandHandlerConfiguration(
        GeneratableClass $commandHandler,
        GeneratableClass $command
    ): void {
        $this->generateService->generateCommandServiceConfiguration(
            new CommandHandlerServiceConfiguration(
                $commandHandler,
                [
                    "@doctrine.orm.entity_manager",
                ],
                [
                    [
                        "name" => "command_handler",
                        "handles" => $command->getClassName()->getForUseStatement(),
                    ],
                ]
            ),
            $this->getTargetPhpVersion()
        );
    }
}
