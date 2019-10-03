<?php

namespace ModuleGenerator\CLI\Console\Generate\Backend\Action;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Module\Backend\Actions\BackendActionDataTransferObject;
use ModuleGenerator\Module\Backend\Actions\BackendActionType;
use ModuleGenerator\Module\Backend\Actions\Edit\Edit;
use ModuleGenerator\Module\Backend\Layout\Templates\Edit\Edit as EditTemplate;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class EditAction extends GenerateCommand
{
    protected function configure()
    {
        parent::configure();

        $this->setName('generate:backend:action:edit')
            ->setDescription('Generate the edit action for an entity');
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
            Edit::fromDataTransferObject($crudActionsDataTransferObject),
            $this->getTargetPhpVersion()
        );
        $this->generateService->generateFile(
            EditTemplate::fromDataTransferObject($crudActionsDataTransferObject),
            $this->getTargetPhpVersion()
        );
    }
}
