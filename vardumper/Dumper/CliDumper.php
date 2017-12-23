<?php

namespace HugeFan\VarDumper\Dumper;

use Symfony\Component\VarDumper\Dumper\CliDumper as SymfonyCliDumper;

class CliDumper extends SymfonyCliDumper
{
	/**
     * Color definitions for output.
     *
     * @var array
     */
	protected $styles = array(
	    // See http://en.wikipedia.org/wiki/ANSI_escape_code#graphics
	    'default' => '38;5;208',
	    'num' => '1;38;5;38',
	    'const' => '1;38;5;208',
	    'str' => '1;38;5;113',
	    'note' => '38;5;38',
	    'ref' => '38;5;247',
	    'public' => '',
	    'protected' => '',
	    'private' => '',
	    'meta' => '38;5;170',
	    'key' => '38;5;113',
	    'index' => '38;5;38',
	);