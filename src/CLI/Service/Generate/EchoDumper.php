<?php

namespace ModuleGenerator\CLI\Service\Generate;

final class EchoDumper implements Dumper
{
    public function dump(string $filename, string $content)
    {
        echo '########## START FILE ##########' . PHP_EOL;
        echo '########## START FILENAME ##########' . PHP_EOL;
        echo '# ' . $filename . ' #' . PHP_EOL;
        echo '########## END FILENAME ##########' . PHP_EOL;
        echo '########## START CONTENT ##########' . PHP_EOL;
        echo $content;
        echo '########## END CONTENT ##########' . PHP_EOL;
        echo '########## END FILE ##########' . PHP_EOL;
    }
}
