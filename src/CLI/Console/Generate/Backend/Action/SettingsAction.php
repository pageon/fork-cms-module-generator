<?php

namespace ModuleGenerator\CLI\Console\Generate\Backend\Action;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Domain\Command\Settings\SettingsCommand;
use ModuleGenerator\Domain\Command\Settings\SettingsCommandHandler;
use ModuleGenerator\Domain\FormType\SettingsType;
use ModuleGenerator\Module\Backend\Actions\BackendSettingsActionDataTransferObject;
use ModuleGenerator\Module\Backend\Actions\BackendSettingsActionType;
use ModuleGenerator\Module\Backend\Actions\Settings\Settings;
use ModuleGenerator\Module\Backend\Layout\Templates\Settings\Settings as SettingsTemplate;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SettingsAction extends GenerateCommand
{
    protected function configure()
    {
        parent::configure();

        $this->setName('generate:backend:action:settings')
            ->setDescription('Generate a settings action');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        /** @var BackendSettingsActionDataTransferObject $backendSettingsActionDataTransferObject */
        $backendSettingsActionDataTransferObject = $this->getFormData(BackendSettingsActionType::class);

        $this->generateAction($backendSettingsActionDataTransferObject);
    }

    public function generateAction(
        BackendSettingsActionDataTransferObject $backendSettingsActionDataTransferObject
    ): void {
        $this->generateService->generateClass(
            Settings::fromDataTransferObject($backendSettingsActionDataTransferObject),
            $this->getTargetPhpVersion()
        );
        $this->generateService->generateClass(
            SettingsType::fromDataTransferObject($backendSettingsActionDataTransferObject),
            $this->getTargetPhpVersion()
        );
        $this->generateService->generateClass(
            SettingsCommand::fromDataTransferObject($backendSettingsActionDataTransferObject),
            $this->getTargetPhpVersion()
        );
        $this->generateService->generateClass(
            SettingsCommandHandler::fromDataTransferObject($backendSettingsActionDataTransferObject),
            $this->getTargetPhpVersion()
        );
        $this->generateService->generateFile(
            SettingsTemplate::fromDataTransferObject($backendSettingsActionDataTransferObject),
            $this->getTargetPhpVersion()
        );
    }
}
