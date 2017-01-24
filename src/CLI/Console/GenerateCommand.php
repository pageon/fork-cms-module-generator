<?php

namespace ModuleGenerator\CLI\Console;

use ModuleGenerator\CLI\Service\Generate\Generate;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class GenerateCommand extends Command
{
    const SUPPORTED_TARGET_PHP_VERSIONS = [
        '5.6',
        '7.0',
    ];

    /** @var Generate */
    protected $generateService;

    /** @var InputInterface */
    private $input;

    /** @var OutputInterface */
    private $output;

    /** @var float */
    private $targetPhpVersion;

    protected function configure()
    {
        $this->addArgument('php', InputArgument::OPTIONAL, 'Target PHP version', 7.0);
    }

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

        $this->targetPhpVersion = (float) $this->input->getArgument('php');
        if (!in_array($this->targetPhpVersion, self::SUPPORTED_TARGET_PHP_VERSIONS)) {
            throw new InvalidArgumentException(
                'This php version is not available as a target. The possible options are: ' . implode(
                    ', ',
                    self::SUPPORTED_TARGET_PHP_VERSIONS
                )
            );
        }
    }

    public function getTargetPhpVersion(): float
    {
        return $this->targetPhpVersion;
    }

    public function getFormData(string $className)
    {
        $formHelper = $this->getHelper('form');

        return $formHelper->interactUsingForm($className, $this->input, $this->output);
    }
}
