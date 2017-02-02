<?php

namespace ModuleGenerator\Tests\Helper;

final class StringUtil
{
    public static function trimLines($original)
    {
        return implode(
            "\n",
            array_filter(
                array_map(
                    function ($line) {
                        return trim($line);
                    },
                    explode("\n", $original)
                ),
                function ($line) {
                    return $line !== '';
                }
            )
        );
    }
}
