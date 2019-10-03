<?php

namespace ModuleGenerator\CLI\Console\Generate\Frontend\Action;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Module\Frontend\Actions\Detail\Detail;
use ModuleGenerator\Module\Frontend\Layout\Templates\Detail\Detail as DetailTemplate;
use ModuleGenerator\Module\Frontend\Actions\FrontendActionDataTransferObject;
use ModuleGenerator\Module\Frontend\Actions\FrontendActionType;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DetailAction extends GenerateCommand
{
    protected function configure()
    {
        parent::configure();

        $this->setName('generate:frontend:action:detail')
            ->setDescription('Generate a detail action');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        $frontendActionDataTransferObject = $this->getFormData(FrontendActionType::class);

        $this->generateAction($frontendActionDataTransferObject);
    }

    public function generateAction(FrontendActionDataTransferObject $frontendActionDataTransferObject): void
    {
        $this->generateService->generateClass(
            Detail::fromDataTransferObject($frontendActionDataTransferObject),
            $this->getTargetPhpVersion()
        );
        $this->generateService->generateFile(
            DetailTemplate::fromDataTransferObject($frontendActionDataTransferObject),
            $this->getTargetPhpVersion()
        );
    }
}
