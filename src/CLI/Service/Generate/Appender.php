<?php

namespace ModuleGenerator\CLI\Service\Generate;

interface Appender
{
    public function append(string $filename, string $content);
}
