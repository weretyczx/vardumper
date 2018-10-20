<?php

use Weretyczx\Vardumper\Dumper;

if (!function_exists('dd')) {
    function dd(...$args)
    {
        foreach ($args as $x) {
            (new Dumper)->dump($x);
        }

        return $args;
    }
}

if (!function_exists('d')) {
    function d(...$args)
    {
        foreach ($args as $x) {
            (new Dumper)->dump($x);
        }

        exit(1);
    }
}
