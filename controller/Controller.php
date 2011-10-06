<?php
require_once 'classes/Urlbuilder.php';

/**
 * Ministream controller
 *
 * @author David Mohl
 */
class Controller {

    private $_view = null;
    private $_useLayout;
    private $_layout = false;
    private $_urlbuilder;
    private $_templatevars;

    function __construct()
    {
        $this->_urlbuilder = new Urlbuilder();
        $this->_templatevars = array();
    }

    public function init($request)
    {
    }

    public function setHeader($header, $replace = true, $statuscode = NULL)
    {
        if (is_null($statuscode))
            header($header, $replace);
        else
            header($header, $replace, $statuscode);
    }

    public function addTemplatevar($key, $value)
    {
        $this->_templatevars[$key] = $value;
    }

    public function redirect($url)
    {
        $this->setHeader("Location: " . $url);
        exit;
    }

    public function useView($view)
    {
        $this->_view = $view;
    }

    public function useLayout($layout)
    {
        $this->_layout = $layout;
        $this->_useLayout = true;
    }

    public function getBuilder()
    {
        return $this->_urlbuilder;
    }

    public function run()
    {
        $_URLBUILDER = $this->getBuilder();
        $_TP = $this->_templatevars;

        if ($this->_useLayout) {
            ob_start();
                if (!is_null($this->_view)) {
                    include 'view/' . $this->_view . '.php';
                }
                
                $_CONTENT = ob_get_contents();
            ob_end_clean();

            include 'view/' . $this->_layout . '.php';
        }
        else {
            if (!is_null($this->_view)) {
                include 'view/' . $this->_view . '.php';
            }
        }

    }
}
?>
