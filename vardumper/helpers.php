<?php

use HugeFan\VarDumper\Tracker;
use HugeFan\VarDumper\Vardumper;

if (! function_exists('ddd')) {

	function ddd ($var)
	{
		// Resolve Chrome dd() fail
		http_response_code(500);

		 array_map(function ($x) {
            (new VarDumper)->dump($x);
        }, func_get_args());

        die();
	}
}