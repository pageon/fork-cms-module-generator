<?php

namespace ModuleGenerator\CLI\Console\Generate\Domain;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Domain\DataGrid\DataGrid as DataGridClass;
use ModuleGenerator\Domain\DataGrid\DataGridDataTransferObject;
use ModuleGenerator\Domain\DataGrid\DataGridType;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DataGrid extends GenerateCommand
{
    protected function configure()
    {
        parent::configure();

        $this->setName('generate:domain:data-grid')
            ->setDescription('Generates a data grid for an entity');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        /** @var DataGridDataTransferObject $dataGridDataTransferObject */
        $dataGridDataTransferObject = $this->getFormData(DataGridType::class);

        $this->generateService->generateClass(
            DataGridClass::fromDataTransferObject($dataGridDataTransferObject),
            $this->getTargetPhpVersion()
        );
    }
}
