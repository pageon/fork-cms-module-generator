<?php

namespace ModuleGenerator\SumoCoders\Docker\DockerComposeDev;

use ModuleGenerator\CLI\Service\Generate\GeneratableFile;
use ModuleGenerator\SumoCoders\ProjectDataTransferObject;

final class DockerComposeDev extends GeneratableFile
{
    /** @var string */
    private $project;

    public function __construct(string $project)
    {
        $this->project = $project;
    }

    public function getProject(): string
    {
        return $this->project;
    }

    public function getFilePath(float $targetPhpVersion): string
    {
        return '../docker-compose-dev.yml';
    }

    public function getTemplatePath(float $targetPhpVersion): string
    {
        return __DIR__ . '/docker-compose-dev.yml.twig';
    }

    public static function fromDataTransferObject(ProjectDataTransferObject $projectDataTransferObject): self
    {
        return new self(
            $projectDataTransferObject->project
        );
    }
}
