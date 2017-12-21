<?php

namespace ModuleGenerator\CLI\Console;

use ModuleGenerator\CLI\Service\Generate\Generate;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class GenerateCommand extends Command
{
    /** @var Generate */
    protected $generateService;

    /** @var InputInterface */
    private $input;

    /** @var OutputInterface */
    private static $output;

    /** @var float */
    private $targetPhpVersion;

    protected function configure()
    {
        $this->addArgument(
            'php',
            InputArgument::OPTIONAL,
            'Target PHP version',
            '7.1'
        );
    }

    public function __construct(Generate $generateService)
    {
        $this->generateService = $generateService;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        self::$output = $output;

        $this->targetPhpVersion = (float) $this->input->getArgument('php');
    }

    public function getTargetPhpVersion(): float
    {
        return $this->targetPhpVersion;
    }

    public function getFormData(string $className, array $options = [], $data = null)
    {
        $formHelper = $this->getHelper('form');

        return $formHelper->interactUsingForm($className, $this->input, self::$output, $options, $data);
    }

    /**
     * Yes I know it is dirty but it works for now
     *
     * @return OutputInterface
     */
    public static function getOutput()
    {
        return self::$output;
    }
}
