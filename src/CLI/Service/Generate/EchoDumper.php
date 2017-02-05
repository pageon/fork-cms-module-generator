<?php

namespace ModuleGenerator\CLI\Service\Generate;

final class EchoDumper implements Dumper
{
    public function dump(string $filename, string $content)
    {
        // make the url more clear and work from the src directory for easier use in tests
        $filename = substr($filename, ($srcPosition = strpos($filename, 'src')) !== false ? $srcPosition : 0);
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
