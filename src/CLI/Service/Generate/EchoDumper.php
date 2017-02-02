<?php

namespace ModuleGenerator\CLI\Service\Generate;

final class EchoDumper implements Dumper
{
    public function dump(string $filename, string $content)
    {
        echo 'Filename: "' . $filename . '"' . PHP_EOL;
        echo 'Content:' . PHP_EOL;
        echo $content;
    }
}
