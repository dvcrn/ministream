<?php
class FrontpageController
{
  private $_request;
  private $_action;
  private $_controller;

  function __construct()
  {
      $this->_request['get'] = $_GET;
      $this->_request['post'] = $_POST;
      $this->_controller = isset($_GET['controller']) ? $_GET['controller'] . 'Controller' : null;
      $this->_action = isset($_GET['action']) ? $_GET['action'] . 'Action' : null;
  }

  public static function _call404()
  {
    include '404.html';
    exit;
  }

  public function run()
  {
      $controllerfile = 'controller/' . $this->_controller . '.php';
      
      if ( is_file($controllerfile) AND (!is_null($this->_action)) )
          require_once $controllerfile;
      else
          $this->_call404();

      $controller = new $this->_controller;
      $controller->init($this->_request);

      try 
      {
          $action = $this->_action;
          $controller->$action();
      }
      catch(Exception $e)
      {
        $this->_call404();
      }
  }

}
?>
