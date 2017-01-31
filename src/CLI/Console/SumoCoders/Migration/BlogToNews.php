<?php

namespace ModuleGenerator\CLI\Console\SumoCoders\Migration;

use ModuleGenerator\CLI\Console\GenerateCommand;
use ModuleGenerator\SumoCoders\Migration\BlogToNews\BlogToNewsMigration;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class BlogToNews extends GenerateCommand
{
    protected function configure()
    {
        parent::configure();

        $this->setName('sumocoders:migration:blog-to-news')
            ->setDescription('Generates a migration to rename blog to news');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        $this->generateService->generateFile(new BlogToNewsMigration(), $this->getTargetPhpVersion());
    }
}
