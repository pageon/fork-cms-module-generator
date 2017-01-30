<?php

namespace ModuleGenerator\SumoCoders\Docker\DockerSync;

use ModuleGenerator\CLI\Service\Generate\GeneratableFile;
use ModuleGenerator\SumoCoders\ProjectDataTransferObject;

final class DockerSync extends GeneratableFile
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
        return '../docker-sync.yml';
    }

    public function getTemplatePath(float $targetPhpVersion): string
    {
        return __DIR__ . '/docker-sync.yml.twig';
    }

    public static function fromDataTransferObject(ProjectDataTransferObject $projectDataTransferObject): self
    {
        return new self(
            $projectDataTransferObject->project
        );
    }
}
