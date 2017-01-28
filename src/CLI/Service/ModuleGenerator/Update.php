<?php

namespace ModuleGenerator\CLI\Service\ModuleGenerator;

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
            . ' && echo "Start updating"'
            . ' && echo "updating: 0/2"'
            . ' && curl -sS https://getcomposer.org/installer | php  > /dev/null'
            . ' && echo "updating: 1/2"'
            . ' && php composer.phar update justcarakas/fork-cms-module-generator --no-dev --quiet'
            . ' && echo "updating: 2/2"'
            . ' && cd -'
            . ' && echo "Finished updating"'
        );
    }
}
