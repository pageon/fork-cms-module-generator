<?php

namespace ModuleGenerator\CLI\Console\Generate\Actions;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Module\Backend\Actions\CRUDActionsDataTransferObject;
use ModuleGenerator\Module\Backend\Actions\CRUDActionsType;
use ModuleGenerator\Module\Backend\Actions\Delete\Delete;
use ModuleGenerator\Module\Backend\Layout\Templates\Delete\Delete as DeleteTemplate;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DeleteAction extends GenerateCommand
{
    protected function configure()
    {
        parent::configure();

        $this->setName('generate:backend:action:delete')
            ->setDescription('Generate the delete action for an entity');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        /** @var CRUDActionsDataTransferObject $crudActionsDataTransferObject */
        $crudActionsDataTransferObject = $this->getFormData(CRUDActionsType::class);

        $this->generateAction($crudActionsDataTransferObject);
    }

    public function generateAction(CRUDActionsDataTransferObject $crudActionsDataTransferObject): void
    {
        $this->generateService->generateClass(
            Delete::fromDataTransferObject($crudActionsDataTransferObject),
            $this->getTargetPhpVersion()
        );
        $this->generateService->generateFile(
            DeleteTemplate::fromDataTransferObject($crudActionsDataTransferObject),
            $this->getTargetPhpVersion()
        );
    }
}
