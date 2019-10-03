<?php

namespace ModuleGenerator\CLI\Console\Generate\Frontend\Action;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Module\Frontend\Actions\Index\Index;
use ModuleGenerator\Module\Frontend\Layout\Templates\Index\Index as IndexTemplate;
use ModuleGenerator\Module\Frontend\Actions\FrontendActionDataTransferObject;
use ModuleGenerator\Module\Frontend\Actions\FrontendActionType;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class IndexAction extends GenerateCommand
{
    protected function configure()
    {
        parent::configure();

        $this->setName('generate:frontend:action:index')
            ->setDescription('Generate an index action');
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
            Index::fromDataTransferObject($frontendActionDataTransferObject),
            $this->getTargetPhpVersion()
        );
        $this->generateService->generateFile(
            IndexTemplate::fromDataTransferObject($frontendActionDataTransferObject),
            $this->getTargetPhpVersion()
        );
    }
}
