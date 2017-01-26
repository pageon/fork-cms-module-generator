<?php

namespace ModuleGenerator\CLI\Console\Generate\Module;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Module\Backend\DependencyInjection\ModuleExtension\ModuleExtension;
use ModuleGenerator\Module\Backend\Info\Info;
use ModuleGenerator\Module\Backend\Info\InfoType;
use ModuleGenerator\Module\Backend\Installer\Data\Locale\Locale;
use ModuleGenerator\Module\Backend\Installer\Installer\Installer;
use ModuleGenerator\Module\Backend\Resources\Config\Commands\Commands;
use ModuleGenerator\Module\Backend\Resources\Config\Doctrine\Doctrine;
use ModuleGenerator\Module\Backend\Resources\Config\Repositories\Repositories;
use ModuleGenerator\Module\Backend\Resources\Config\Services\Services;
use ModuleGenerator\Module\Frontend\Config\Config as FrontendConfig;
use ModuleGenerator\Module\Backend\Config\Config as BackendConfig;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class Bootstrap extends GenerateCommand
{
    protected function configure()
    {
        parent::configure();

        $this->setName('generate:module:bootstrap')
            ->setDescription('Generates the base for a module');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        $info = Info::fromDataTransferObject($this->getFormData(InfoType::class));

        $this->generateService->generateClasses(
            [
                new FrontendConfig($info->getModuleName()),
                new BackendConfig($info->getModuleName()),
                new ModuleExtension($info->getModuleName()),
                new Installer($info->getModuleName()),
            ],
            $this->getTargetPhpVersion()
        );
        $this->generateService->generateFiles(
            [
                $info,
                new Commands($info->getModuleName()),
                new Doctrine($info->getModuleName()),
                new Repositories($info->getModuleName()),
                new Services($info->getModuleName()),
                new Locale($info->getModuleName()),
            ],
            $this->getTargetPhpVersion()
        );
    }
}
