<?php

namespace Weretyczx\Vardumper;

class Tracker
{
    /**
     *    Debug info
     *    @var array
     */
    protected $debug = [];

    protected $functions = ['dd', 'd'];

    public function __construct()
    {
        //  Get trace
        $this->debug = $this->debugInfo();
    }

    /**
     *    trace info
     *    @return [type] [description]
     */
    private function debugInfo()
    {
        $info = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);

        foreach ($info as $key => $trace) {
            if (in_array($trace['function'], $this->functions)) {
                return $trace;
            }
        }
    }

    /**
     *    trace position message
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
