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
            . ' && git pull origin master --quiet'
            . ' && echo "updating: 1/4"'
            . ' && curl -sS https://getcomposer.org/installer | php  > /dev/null'
            . ' && echo "updating: 2/4"'
            . ' && php composer.phar install --no-dev --quiet'
            . ' && echo "updating: 3/4"'
            . ' && git remote update  > /dev/null'
            . ' && echo "updating: 4/4"'
            . ' && cd -'
            . ' && echo "Finished updating"'
        );
    }
}
