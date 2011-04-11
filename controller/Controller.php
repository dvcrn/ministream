<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author dmohl
 */
class Controller {
    //put your code here
    private $_view;

    public function init($request)
    {
        
    }

    public function useView($view)
    {
        $this->_view = $view;
    }

    public function run()
    {
        include 'view/' . $this->_view . '.php';
    }
}
?>
