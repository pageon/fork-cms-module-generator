<?php

namespace ModuleGenerator\CLI\Console\Generate\Domain;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\Domain\Entity\Entity as EntityClass;
use ModuleGenerator\Domain\Entity\EntityType;
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

        $this->generateService->generateClass($entity, $this->getTargetPhpVersion());
    }
}
