<?php

namespace ModuleGenerator\CLI\Console\Generate\Backend\Action;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Module\Backend\Actions\BackendActionDataTransferObject;
use ModuleGenerator\Module\Backend\Actions\BackendActionType;
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

        /** @var BackendActionDataTransferObject $crudActionsDataTransferObject */
        $crudActionsDataTransferObject = $this->getFormData(BackendActionType::class);

        $classes = [
            AddAction::class,
            DeleteAction::class,
            EditAction::class,
            IndexAction::class,
        ];

        foreach ($classes as $class) {
            (new $class($this->generateService))->setTargetPhpVersion($this->getTargetPhpVersion())->generateAction(
                $crudActionsDataTransferObject
            );
        }
    }
}
