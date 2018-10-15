<?php

namespace Weretyczx\Vardumper;

class Tracker
{
    /**
     *    Debug info
     *    @var array
     */
    protected $debug = [];

    public function __construct()
    {
        //  Get last trace
        $this->debug = array_pop(debug_backtrace());
    }

    /**
     *    trace position info
     *    @return [type] [description]
     */
    public function trace() : string
    {
        return '👨🏻‍💻 '.
                $this->getPathLayer($this->debug['file']).
                ' : '.
                $this->debug['line'];
    }

    /**
     *    Get path
     *    @param  [type]  $path  [description]
     *    @param  integer $layer [description]
     *    @return [type]         [description]
     */
    private function getPathLayer($path, $layer = 3)
    {
        $path = explode('/', $path);
        $path = array_slice($path, (-1 * $layer), $layer, true);
        return implode('/', $path);
    }
}
