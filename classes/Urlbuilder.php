<?php
require_once 'classes/Settings.php';

class Urlbuilder
{
	private $_settings;
	private $_dispatcher;
	private $_controller;
	private $_action;

	function __construct() 
	{
		$this->_settings = new Settings();
		$this->_dispatcher = $this->_settings->get('dispatcher');
		$this->_controller = $this->_settings->get('controller_prefix');
		$this->_action = $this->_settings->get('action_prefix');
	}

	public function buildUrl($controller, $action = null, $params = null)
	{
		$url = $this->_dispatcher . "?";
		$url = $url . $this->_controller . "=" . $controller;

		if (!is_null($action)) {
			$url = $url . "&" .$this->_action . "=" . $action;
		}

		if (!is_null($params))
		{
			foreach ($params as $key => $value) {
			    $url = $url . "&" . $key . "=" . $value ;
			}				
		}

		return $url;
	}

}
?>