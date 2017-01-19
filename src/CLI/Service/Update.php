<?php

namespace ModuleGenerator\Service;

final class Update
{
    /**
     * @var string The basedir of the module-generator installation
     */
    protected $basedir;

    /**
     * @param string $basedir The basedir of the module-generator installation
     */
    public function __construct($basedir)
    {
        $this->basedir = (string) $basedir;
    }

    /**
     * This methods runs an update on the repository
     */
    public function run()
    {
        passthru(
            'cd ' . realpath($this->basedir)
            . ' && git pull origin master'
            . ' && curl -sS https://getcomposer.org/installer | php'
            . ' && php composer.phar install'
            . ' && git remote update'
            . ' && cd -'
        );
    }
}
