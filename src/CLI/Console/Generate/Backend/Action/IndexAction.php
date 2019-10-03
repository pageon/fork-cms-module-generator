<?php

namespace ModuleGenerator\CLI\Console\Generate\Backend\Action;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Module\Backend\Actions\BackendActionDataTransferObject;
use ModuleGenerator\Module\Backend\Actions\BackendActionType;
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

        /** @var BackendActionDataTransferObject $crudActionsDataTransferObject */
        $crudActionsDataTransferObject = $this->getFormData(BackendActionType::class);

        $this->generateAction($crudActionsDataTransferObject);
    }

    public function generateAction(BackendActionDataTransferObject $crudActionsDataTransferObject): void
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
