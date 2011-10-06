<?php
require_once 'classes/Settings.php';
require_once 'classes/Request.php';

class Ministream
{
  private $_request;
  private $_action;
  private $_controller;
  private $_settings;

  function __construct()
  {
      $get = $this->_request['get'] = $_GET;
      $post = $this->_request['post'] = $_POST;
      $this->_request = new Request($get, $post);

      $this->_settings = new Settings();

      $cp = $this->_settings->get('controller_prefix');
      $ap = $this->_settings->get('action_prefix');

      $this->_controller = isset($_GET[$cp]) ? $_GET[$cp] . 'Controller' : 'IndexController';
      $this->_action = isset($_GET[$ap]) ? $_GET[$ap] . 'Action' : null;
  }

  public static function _call404()
  {
    include '404.html';
    exit;
  }

  public function run()
  {
      $controllerfile = 'controller/' . $this->_controller . '.php';
      
      if ( is_file($controllerfile) )
          require_once $controllerfile;
      else
          $this->_call404();

      $controller = new $this->_controller;
      $controller->init($this->_request);

      try 
      {
          $action = $this->_action;
          if ( $action )
            $controller->$action();
          else
            $controller->indexAction();
      }
      catch(Exception $e)
      {
        $this->_call404();
      }
  }

}
?>
