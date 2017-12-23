<?php

namespace HugeFan\VarDumper;

use HugeFan\VarDumper\Dumper\CliDumper;
use HugeFan\VarDumper\Dumper\HtmlDumper;
use HugeFan\VarDumper\Tracker;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\VarDumper as SymfonyVarDumper;

class VarDumper extends SymfonyVarDumper
{
    private static $handler;

    public static function dump($var)
    {
        if (null === self::$handler) {

            $cloner = new VarCloner();
            $dumper = 'cli' === PHP_SAPI ? new CliDumper() : new HtmlDumper();

            // Tracker source
            (new Tracker)->printMessage(debug_backtrace());

            self::$handler = function ($var) use ($cloner, $dumper) {
                $dumper->dump($cloner->cloneVar($var));
            };
        }

        return call_user_func(self::$handler, $var);
    }
}


