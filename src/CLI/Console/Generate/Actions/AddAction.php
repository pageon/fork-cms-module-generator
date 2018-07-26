<?php

namespace ModuleGenerator\CLI\Console\Generate\Actions;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Module\Backend\Actions\BackendActionDataTransferObject;
use ModuleGenerator\Module\Backend\Actions\BackendActionType;
use ModuleGenerator\Module\Backend\Actions\Add\Add;
use ModuleGenerator\Module\Backend\Layout\Templates\Add\Add as AddTemplate;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddAction extends GenerateCommand
{
    protected function configure()
    {
        parent::configure();

        $this->setName('generate:backend:action:add')
            ->setDescription('Generate the add action for an entity');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        /** @var BackendActionDataTransferObject $crudActionsDataTransferObject */
        $crudActionsDataTransferObject = $this->getFormData(BackendActionType::class);

        $this->generateAction($crudActionsDataTransferObject);
    }

    public function generateAction(BackendActionDataTransferObject $crudActionsDataTransferObject): void
    {
        $this->generateService->generateClass(
            Add::fromDataTransferObject($crudActionsDataTransferObject),
            $this->getTargetPhpVersion()
        );
        $this->generateService->generateFile(
            AddTemplate::fromDataTransferObject($crudActionsDataTransferObject),
            $this->getTargetPhpVersion()
        );
    }
}
