<?php

namespace ModuleGenerator\Tests\Helper;

use Symfony\Component\Console\Input\StringInput;

/**
 * Copied from https://github.com/matthiasnoback/symfony-console-form/blob/master/test/Helper/InteractiveStringInput.php
 */
final class InteractiveStringInput extends StringInput
{
    public function setInteractive($interactive)
    {
        // this function is disabled to prevent setting non interactive mode on string input after posix_isatty return false
    }
}
