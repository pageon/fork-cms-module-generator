<?php

namespace ModuleGenerator\CLI\Console\SumoCoders\Docker;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\SumoCoders\Docker\DockerCompose\DockerCompose;
use ModuleGenerator\SumoCoders\Docker\DockerComposeDev\DockerComposeDev;
use ModuleGenerator\SumoCoders\Docker\DockerSync\DockerSync;
use ModuleGenerator\SumoCoders\ProjectType;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class Config extends GenerateCommand
{
    protected function configure()
    {
        parent::configure();

        $this->setName('sumocoders:docker:config')
            ->setDescription('Generates the docker config for sumocoders');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        $projectDataTransferObject = $this->getFormData(ProjectType::class);
        $this->generateService->generateFiles(
            [
                new DockerCompose(),
                DockerComposeDev::fromDataTransferObject($projectDataTransferObject),
                DockerSync::fromDataTransferObject($projectDataTransferObject),
            ],
            $this->getTargetPhpVersion()
        );
    }
}
