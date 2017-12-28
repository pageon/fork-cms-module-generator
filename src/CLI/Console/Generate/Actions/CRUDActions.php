<?php

namespace ModuleGenerator\CLI\Console\Generate\Actions;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Module\Backend\Actions\Add\Add;
use ModuleGenerator\Module\Backend\Actions\CRUDActionsDataTransferObject;
use ModuleGenerator\Module\Backend\Actions\CRUDActionsType;
use ModuleGenerator\Module\Backend\Actions\Delete\Delete;
use ModuleGenerator\Module\Backend\Actions\Edit\Edit;
use ModuleGenerator\Module\Backend\Actions\Index\Index;
use ModuleGenerator\Module\Backend\Layout\Templates\Add as AddTemplate;
use ModuleGenerator\Module\Backend\Layout\Templates\Edit as EditTemplate;
use ModuleGenerator\Module\Backend\Layout\Templates\Index as IndexTemplate;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CRUDActions extends GenerateCommand
{
    protected function configure()
    {
        parent::configure();

        $this->setName('generate:backend:crud')
            ->setDescription('Generates the index, add, update and delete action for an entity');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        /** @var CRUDActionsDataTransferObject $crudActionsDataTransferObject */
        $crudActionsDataTransferObject = $this->getFormData(CRUDActionsType::class);

        $this->generateService->generateClasses(
            [
                Index::fromDataTransferObject($crudActionsDataTransferObject),
                Add::fromDataTransferObject($crudActionsDataTransferObject),
                Edit::fromDataTransferObject($crudActionsDataTransferObject),
                Delete::fromDataTransferObject($crudActionsDataTransferObject),
            ],
            $this->getTargetPhpVersion()
        );

        $this->generateService->generateFiles(
            [
                IndexTemplate::fromDataTransferObject($crudActionsDataTransferObject),
                AddTemplate::fromDataTransferObject($crudActionsDataTransferObject),
                EditTemplate::fromDataTransferObject($crudActionsDataTransferObject),
            ],
            $this->getTargetPhpVersion()
        );
    }
}
