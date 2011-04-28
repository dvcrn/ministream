<?php
/* 
 * Example how to use it
 */

class IndexController extends Controller {

    public function init($request)
    {
        
    }
    
    public function indexAction()
    {
        $this->useView('index');
        $this->run();
    }
}
?>
