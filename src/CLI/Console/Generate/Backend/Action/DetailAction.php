<?php

namespace ModuleGenerator\CLI\Console\Generate\Backend\Action;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Module\Backend\Actions\BackendActionDataTransferObject;
use ModuleGenerator\Module\Backend\Actions\BackendActionType;
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

        /** @var BackendActionDataTransferObject $crudActionsDataTransferObject */
        $crudActionsDataTransferObject = $this->getFormData(BackendActionType::class);

        $this->generateAction($crudActionsDataTransferObject);
    }

    public function generateAction(BackendActionDataTransferObject $crudActionsDataTransferObject): void
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
