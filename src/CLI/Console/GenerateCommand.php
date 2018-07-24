<?php

namespace ModuleGenerator\CLI\Console;

use ModuleGenerator\CLI\Service\Generate\Generate;
use ModuleGenerator\PhpGenerator\ModuleName\ModuleName;
use ModuleGenerator\PhpGenerator\PhpNamespace\PhpNamespace;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class GenerateCommand extends Command
{
    private const PHP71 = '7.1';

    /** @var Generate */
    protected $generateService;

    /** @var InputInterface */
    private $input;

    /** @var OutputInterface */
    private static $output;

    /** @var float */
    private $targetPhpVersion;

    public function __construct(Generate $generateService)
    {
        $this->generateService = $generateService;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        self::$output = $output;

        $this->targetPhpVersion = self::PHP71;
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

    public function extractModuleName(PhpNamespace $namespace): ?ModuleName
    {
        $matches = [];
        preg_match(
            '|^Backend\\\\Modules\\\\(.*?)\\\\|',
            $namespace,
            $matches
        );

        if (\count($matches) === 2) {
            return new ModuleName($matches[1]);
        }

        return null;
    }
}
