<?php

namespace ModuleGenerator\CLI\Console\Generate\Domain;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Domain\Repository\Repository as RepositoryClass;
use ModuleGenerator\Domain\Repository\RepositoryType;
use ModuleGenerator\Module\Backend\Resources\Config\Repositories\Repositories;
use ModuleGenerator\PhpGenerator\ClassName\ClassName;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleName;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class Repository extends GenerateCommand
{
    protected function configure()
    {
        parent::configure();

        $this->setName('generate:domain:repository')
            ->setDescription('Generates the repository class for an entity');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        $this->createRepository(ClassName::fromDataTransferObject($this->getFormData(RepositoryType::class)));
    }

    public function createRepository(ClassName $entityClassName): void
    {
        $repositoryClass = RepositoryClass::fromEntityClassName($entityClassName);
        $this->generateService->generateClass(
            $repositoryClass,
            $this->getTargetPhpVersion()
        );

        $moduleName = $this->extractModuleName($repositoryClass->getClassName()->getNamespace());
        if ($moduleName instanceof ModuleName) {
            $this->generateService->generateFile(
                new Repositories(
                    $moduleName,
                    [$repositoryClass->getClassName()->getForUseStatement()],
                    true
                ),
                $this->getTargetPhpVersion()
            );
        }
    }
}
