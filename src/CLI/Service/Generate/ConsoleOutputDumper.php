<?php

namespace ModuleGenerator\CLI\Service\Generate;

use ModuleGenerator\CLI\Console\GenerateCommand;

final class ConsoleOutputDumper implements Dumper
{
    public function dump(string $filename, string $content)
    {
        // make the url more clear and work from the src directory for easier use in tests
        $filename = substr($filename, ($srcPosition = strpos($filename, 'src')) !== false ? $srcPosition : 0);
        $output = GenerateCommand::getOutput();
        $output->writeln('########## START FILE ##########');
        $output->writeln('########## START FILENAME ##########');
        $output->writeln('# ' . $filename . ' #');
        $output->writeln('########## END FILENAME ##########');
        $output->writeln('########## START CONTENT ##########');
        $output->writeln($content);
        $output->writeln('########## END CONTENT ##########');
        $output->writeln('########## END FILE ##########');
    }
}
