<?php

namespace ModuleGenerator\CLI\Console\Generate\Actions;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Domain\Actions\CRUDActionsType;
use ModuleGenerator\Domain\Actions\Index\Index;
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

        $crudActionsDataTransferObject = $this->getFormData(CRUDActionsType::class);

        $this->generateService->generateClass(
            Index::fromDataTransferObject($crudActionsDataTransferObject),
            $this->getTargetPhpVersion()
        );
    }
}
