<?php

namespace ModuleGenerator\CLI\Console\Settings;

use ModuleGenerator\CLI\Service\ModuleGenerator\Settings;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class Reset extends Command
{
    /** @var Settings */
    private $settings;

    public function __construct(Settings $settings)
    {
        $this->settings = $settings;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('settings:reset')
            ->setDescription('Reset the settings to the default settings');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->settings->reset();
    }
}
