<?php

namespace ModuleGenerator\CLI\Console\ModuleGenerator;

use Symfony\Component\Console\Command\Command;
use ModuleGenerator\CLI\Service\ModuleGenerator\Update as UpdateService;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class Update extends Command
{
    /** @var UpdateService */
    protected $update;

    /**
     * @param string $name The name for this command
     */
    public function __construct(UpdateService $update)
    {
        parent::__construct();

        $this->update = $update;
    }

    protected function configure()
    {
        $this->setName('module-generator:update')
            ->setDescription('Updates the module-generator')
            ->setAliases(['self:update']);
    }

    /**
     * @param InputInterface $input The input
     * @param OutputInterface $output The output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->update->run();
    }
}
