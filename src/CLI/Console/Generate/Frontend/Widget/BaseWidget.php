<?php

namespace ModuleGenerator\CLI\Console\Generate\Frontend\Widget;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Module\Frontend\Widgets\Base\Base;
use ModuleGenerator\Module\Frontend\Layout\Widgets\Base\Base as BaseTemplate;
use ModuleGenerator\Module\Frontend\Widgets\FrontendWidgetDataTransferObject;
use ModuleGenerator\Module\Frontend\Widgets\FrontendWidgetType;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BaseWidget extends GenerateCommand
{
    protected function configure()
    {
        parent::configure();

        $this->setName('generate:frontend:widget:base')
            ->setDescription('Generate a base widget');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        $frontendWidgetDataTransferObject = $this->getFormData(FrontendWidgetType::class);

        $this->generateWidget($frontendWidgetDataTransferObject);
    }

    public function generateWidget(FrontendWidgetDataTransferObject $frontendWidgetDataTransferObject): void
    {
        $this->generateService->generateClass(
            Base::fromDataTransferObject($frontendWidgetDataTransferObject),
            $this->getTargetPhpVersion()
        );
        $this->generateService->generateFile(
            BaseTemplate::fromDataTransferObject($frontendWidgetDataTransferObject),
            $this->getTargetPhpVersion()
        );
    }
}
