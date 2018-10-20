<?php

namespace Weretyczx\Vardumper;

use Weretyczx\Vardumper\Tracker;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;

class Dumper
{
    /**
     * Dump a value with elegance.
     *
     * @param  mixed  $value
     * @return void
     */
    public function dump($value)
    {
        if (class_exists(CliDumper::class)) {
            if (in_array(PHP_SAPI, ['cli', 'phpdbg'])) {
                $dumper = new CliDumper;
            } else {
                http_response_code(500);
                $dumper = new HtmlDumper;
            }

            $info = (new Tracker)->trace();
            $dumper->dump((new VarCloner)->cloneVar($info));
            $dumper->dump((new VarCloner)->cloneVar($value));
        } else {
            var_dump($value);
        }
    }
}
