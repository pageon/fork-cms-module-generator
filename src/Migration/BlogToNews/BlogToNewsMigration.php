<?php

namespace ModuleGenerator\Migration\BlogToNews;

use ModuleGenerator\CLI\Service\Generate\GeneratableFile;

final class BlogToNewsMigration extends GeneratableFile
{
    public function getFilePath(float $targetPhpVersion): string
    {
        return '../migrations/blog-to-news/locale.xml';
    }

    public function getTemplatePath(float $targetPhpVersion): string
    {
        return __DIR__ . '/locale.xml.twig';
    }
}
