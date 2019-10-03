<?php

namespace ModuleGenerator\CLI\Console\Generate\Domain;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Domain\DataTransferObject\DataTransferObject;
use ModuleGenerator\Domain\Entity\Entity as EntityClass;
use ModuleGenerator\Domain\Entity\EntityType;
use ModuleGenerator\Domain\FormType\FormType;
use ModuleGenerator\Module\Backend\Resources\Config\Doctrine\Doctrine;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleName;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class Entity extends GenerateCommand
{
    protected function configure()
    {
        parent::configure();

        $this->setName('generate:domain:entity')
            ->setDescription('Generates a entity');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        $formInteractor = function (string $className, array $options = [], $data = null) {
            return $this->getFormData($className, $options, $data);
        };

        $entity = EntityClass::fromDataTransferObject(
            $this->getFormData(EntityType::class, ['form-interactor' => $formInteractor])
        );

        $this->generateService->generateClasses(
            [$entity, new DataTransferObject($entity), new FormType($entity)],
            $this->getTargetPhpVersion()
        );

        $moduleName = $this->extractModuleName($entity->getClassName()->getNamespace());
        if ($moduleName instanceof ModuleName) {
            $this->generateService->generateFile(
                new Doctrine(
                    $moduleName,
                    [$entity],
                    true
                ),
                $this->getTargetPhpVersion()
            );
        }

        (new Repository($this->generateService))->setTargetPhpVersion($this->getTargetPhpVersion())->createRepository(
            $entity->getClassName()
        );
    }
}
