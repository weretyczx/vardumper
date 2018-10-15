<?php

if (!function_exists('dd')) {
    function dd(...$args)
    {
        http_response_code(500);

        foreach ($args as $x) {
            (new Weretyczx\Vardumper\Dumper)->dump($x);
        }

        die();
    }
}

if (!function_exists('d')) {
    function d(...$args)
    {
        http_response_code(500);

        foreach ($args as $x) {
            (new Weretyczx\Vardumper\Dumper)->dump($x);
        }

        die();
    }
}
