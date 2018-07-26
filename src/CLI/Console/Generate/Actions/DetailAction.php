<?php

namespace ModuleGenerator\CLI\Console\Generate\Actions;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Module\Backend\Actions\CRUDActionsDataTransferObject;
use ModuleGenerator\Module\Backend\Actions\CRUDActionsType;
use ModuleGenerator\Module\Backend\Actions\Detail\Detail;
use ModuleGenerator\Module\Backend\Layout\Templates\Detail\Detail as DetailTemplate;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DetailAction extends GenerateCommand
{
    protected function configure()
    {
        parent::configure();

        $this->setName('generate:backend:action:detail')
            ->setDescription('Generate the detail action for an entity');
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
            Detail::fromDataTransferObject($crudActionsDataTransferObject),
            $this->getTargetPhpVersion()
        );
        $this->generateService->generateFile(
            DetailTemplate::fromDataTransferObject($crudActionsDataTransferObject),
            $this->getTargetPhpVersion()
        );
    }
}
