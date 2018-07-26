<?php

namespace ModuleGenerator\CLI\Console\Generate\Actions;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Module\Backend\Actions\CRUDActionsDataTransferObject;
use ModuleGenerator\Module\Backend\Actions\CRUDActionsType;
use ModuleGenerator\Module\Backend\Actions\Index\Index;
use ModuleGenerator\Module\Backend\Layout\Templates\Index\Index as IndexTemplate;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class IndexAction extends GenerateCommand
{
    protected function configure()
    {
        parent::configure();

        $this->setName('generate:backend:action:index')
            ->setDescription('Generate the index action for an entity');
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
            Index::fromDataTransferObject($crudActionsDataTransferObject),
            $this->getTargetPhpVersion()
        );
        $this->generateService->generateFile(
            IndexTemplate::fromDataTransferObject($crudActionsDataTransferObject),
            $this->getTargetPhpVersion()
        );
    }
}
