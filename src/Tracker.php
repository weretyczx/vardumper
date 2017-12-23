<?php

namespace HugeFan\VarDumper;

class Tracker
{
	protected $trace = [];

	protected $message = " Dump at %s Line: %u " ;

	public function __construct()
	{
		$this->trace = $this->getTracMessage(debug_backtrace());
	}

	public function printMessage()
	{
		echo sprintf($this->message,
			$this->trace['file'],
			$this->trace['line']
		);
	}

	private function getTracMessage($traces)
	{
		foreach ($traces as $key => $trace) {

			if($this->isCallerTrace($trace)){

				return $trace;
			}
		}
	}

	private function isCallerTrace($value)
	{
		return isset($value['function']) && ($value['function'] == 'ddd');
	}

	private function printTrace($data = null)
	{
		$data = $data ? $data : $this->trace;
		echo '<pre>';
		var_dump($data);
		echo '</pre>';
	}

}