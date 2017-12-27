<?php

namespace ModuleGenerator\Domain\ServiceConfiguration;

use ModuleGenerator\CLI\Exception\NonComplyingModuleName;
use ModuleGenerator\CLI\Service\Generate\GeneratableClass;

final class CommandHandlerServiceConfiguration
{
    /** @var GeneratableClass */
    private $commandHandler;

    /** @var array */
    private $arguments;

    /** @var array */
    private $tags;

    /** @var string */
    private $modulePath;

    public function __construct(GeneratableClass $commandHandler, array $arguments, array $tags)
    {
        $this->commandHandler = $commandHandler;
        $this->arguments = $arguments;
        $this->tags = $tags;
    }

    public static function fromDataTransferObject(
        CommandHandlerServiceConfigurationDataTransferObject $commandHandlerServiceConfigurationDataTransferObject
    ): self {
        return new self(
            $commandHandlerServiceConfigurationDataTransferObject->commandHandler,
            $commandHandlerServiceConfigurationDataTransferObject->arguments,
            $commandHandlerServiceConfigurationDataTransferObject->tags
        );
    }

    public function getCommandHandler(): GeneratableClass
    {
        return $this->commandHandler;
    }

    public function getArguments(): array
    {
        return $this->arguments;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function getTemplatePath(float $targetPhpVersion): string
    {
        return realpath(
            __DIR__ . '/../../' . preg_replace(
                '/^ModuleGenerator/',
                '',
                str_replace('\\', '/', static::class) . '.php' . $targetPhpVersion * 10 . '.yaml.twig'
            )
        );
    }

    public function getServiceName(): string
    {
        return $this->getModuleName() . '.handler.' . strtolower(
                preg_replace(
                    '/([^A-Z])([A-Z])/',
                    "$1_$2",
                    str_replace(
                        'Handler',
                        '',
                        $this->getCommandHandler()->getClassName()->getName()
                    )
                )
            );
    }

    /**
     * @throws NonComplyingModuleName
     */
    public function getModulePath(): string
    {
        if (!$this->modulePath) {
            if (preg_match(
                    '/((?:Backend|Frontend)\/Modules\/(?:[a-zA-Z0-9_]+))\/.*/',
                    str_replace(
                        '\\',
                        DIRECTORY_SEPARATOR,
                        $this->getCommandHandler()->getClassName()->getNamespace()->getName()
                    ),
                    $matches
                ) === false) {
                throw NonComplyingModuleName::forName(
                    $this->getCommandHandler()->getClassName()->getNamespace()->getName()
                );
            }

            $this->modulePath = $matches[1];
        }

        return $this->modulePath;
    }

    public function getModuleName(): string
    {
        $components = explode('/', $this->getModulePath());

        return end($components);
    }

    public function getClassName(): string
    {
        return $this->getCommandHandler()->getClassName()->getForUseStatement();
    }
}
