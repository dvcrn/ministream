<?php

class IndexController extends Controller {

	private $_request;

    public function init(Request $request)
    {
        // Init your controller here :)
        // $request is a instance of Request class
        $this->_request = $request;
    }
    
    public function indexAction()
    {
        // First of all, we say which view we want
        $this->useView("index");

        // Now we say we want to use the layout engine
        $this->useLayout('layout');

        // This line will bind the $request var to the key "request" in views
        $this->addTemplatevar("request", $this->_request);

        // And some example text
        $this->addTemplatevar("text", "I am the index.php view. This text is provided from indexAction");

        // Execute the app
        $this->run();
    }

    public function plusAction()
    {
        $this->useView("plus");
        $this->useLayout("layout");
        $this->addTemplatevar("text", "I am the plus.php view called from plusAction inside IndexController.php. I am rendered inside the layout.php");
        $this->run();
    }
}
?>
