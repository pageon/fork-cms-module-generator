<?php

namespace ModuleGenerator\SumoCoders\Docker\DockerCompose;

use ModuleGenerator\CLI\Service\Generate\GeneratableFile;

final class DockerCompose extends GeneratableFile
{
    public function getFilePath(float $targetPhpVersion): string
    {
        return '../docker-compose.yml';
    }

    public function getTemplatePath(float $targetPhpVersion): string
    {
        return __DIR__ . '/docker-compose.php' . $targetPhpVersion * 10 .'.yml.twig';
    }
}
