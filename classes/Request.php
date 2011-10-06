<?php
class Request
{
	private $_get;
	private $_post;

	function __construct($get, $post)
	{
		$this->_get = $get;
		$this->_post = $post;
	}

	public function get($key)
	{
		return isset($this->_get[$key]) ? $this->_get[$key] : false;	
	}

	public function post($key)
	{
		return isset($this->_post[$key]) ? $this->_post[$key] : false;
	}
}
?>