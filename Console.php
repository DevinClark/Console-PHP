<?php
// # Console.PHP
// 
// __A project by Devin Clark__  

class Console {
	// ## Instance Variable(s)
	// An array of the statements to be outputted.  
	private $statements;
	// An associative array of the count labels and the number of times they have been invoked.  
	private $count_log;

	// ## Constructor(s)  
	// Nothing special here.
	function __construct() {
		$this->statements = array();
		$this->count_log = array();
	}

	// ## log($data, $type)
	// This method is essentially used as a generic log statement but is also used to generate the other log methods that are very similar, debug, error, warn, etc.  
	public function log($data, $type = "log") {
		if(is_array($data))
			$this->statements[] = 'console.' . $type . '(' . json_encode($data) . ');';
		else
			$this->statements[] = 'console.' . $type . '("' . $data . '");';

		return $this;
	}

	public function debug($data) {
		return $this->log($data, "debug");
	}

	// ## error($data)
	// This is mostly aesthetic because the stack trace that is included will be less than useless.
	public function error($data) {
		return $this->log($data, "error");
	}

	public function warn($data) {
		return $this->log($data, "warn");
	}

	public function group($name) {
		return $this->log($name, "group");
	}

	public function groupCollapsed($name) {
		return $this->log($name, "groupCollapsed");
	}

	public function groupEnd() {
		return $this->log("", "groupEnd");
	}

	public function clear() {
		return $this->log("", "clear");
	}

	public function count($label) {
		if(array_key_exists($label, $this->count_log))
			$this->count_log[$label] = ++$this->count_log[$label];
		else
			$this->count_log[$label] = 1;

		return $this->log($label . ": " . $this->count_log[$label], "log");
	}

	// ## dir($data)
	// Right now this only returns the instance variables of the object. It could also return the methods but there really isn't any benefit for it that I can come up with in my sleepy mind.
	public function dir($data) {
		$output = json_encode(get_object_vars($data));
		$output = str_replace('\\u0000', "", $output);
		$this->statements[] = 'console.dir(' . $output . ');';
	}

	public function assert($condition, $message) {
		if($condition == false)
			return $this->log("Assertion Failed: $message", "error");
		else
			return $this;
	}

	// ## table ($data, $columns)
	// I think the implementation of this one might be tricky.
	public function table($data, $columns) {
		// TODO: Put magic in here.
	}

	// ## print_errors()
	// This method outputs a script tag with all the console.* statements you have previously called. 
	public function print_errors() {
		$output = implode("\n", $this->statements);
		$output = "<script>" . $output . "</script>\n";
		return $output;
	}

	// ## __toString()
	// This method allows the object to be converted to a string. It can be used like this `echo (string) $obj;` to output the log statements. Personal preference really. `consoleDemo.php` shows both ways of doing it.
	public function __toString() {
		return $this->print_errors();
	}
}