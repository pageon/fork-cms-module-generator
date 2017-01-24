<?php

namespace ModuleGenerator\CLI\Console;

use ModuleGenerator\CLI\Service\Generate\Generate;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class GenerateCommand extends Command
{
    /** @var Generate */
    protected $generateService;

    /** @var InputInterface */
    private $input;

    /** @var OutputInterface */
    private $output;

    /**
     * @param Generate $generateService
     */
    public function __construct(Generate $generateService)
    {
        parent::__construct();
        $this->generateService = $generateService;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;
    }

    /**
     * @param string $className
     *
     * @return mixed
     */
    public function getFormData($className)
    {
        $formHelper = $this->getHelper('form');

        return $formHelper->interactUsingForm($className, $this->input, $this->output);
    }
}
