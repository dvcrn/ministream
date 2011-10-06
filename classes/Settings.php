<?php

class Settings
{
	private $_settings;

	function __construct()
	{
		$this->_settings = array(

			// The next 3 lines define the url layout
			// In this example: index.php?controller=<controller>&action=<action>
			"dispatcher" => "index.php",
			"controller_prefix" => "controller",
			"action_prefix" => "action",

			// Put additonal Settings in here
			"key" => "value"
		);
	}

	public function get($key)
	{
		return $this->_settings[$key];
	}

}
?>