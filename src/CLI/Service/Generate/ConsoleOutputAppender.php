<?php

namespace ModuleGenerator\CLI\Service\Generate;

use ModuleGenerator\CLI\Console\GenerateCommand;

final class ConsoleOutputAppender implements Appender
{
    public function append(string $filename, string $content)
    {
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
