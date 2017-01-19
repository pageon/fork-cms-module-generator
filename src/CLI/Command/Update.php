<?php

namespace ModuleGenerator\CLI\Command;

use Symfony\Component\Console\Command\Command;
use ModuleGenerator\Service\Update as UpdateService;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class Update extends Command
{
    /** @var UpdateService */
    protected $update;

    /**
     * @param string $name The name for this command
     */
    public function __construct($name, UpdateService $update)
    {
        parent::__construct($name);

        $this->update = $update;
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
