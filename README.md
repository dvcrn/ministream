# Ministream

### Overview

**Ministream**, is a very basic PHP Framework, implementing a Zend-like PHP Frontpagecontroller pattern.

It forces you to write object oriented code and helps to start fast with your application without having a gigantic framework in your neck.

### Getting started

First of all, copy the whole structure in your project / htdocs dir.
Now simply open your browser and go that directory, you should see a little welcome page.

That's it. You are using it now!

### Controller & Actions

Controller are build exactly as in Zend. Put your file into the controller/ dir and name it &lt;myName&gt;Controller.php. This part is important.

Controller sceleton:
	<?php

	class IndexController extends Controller {

		private $_request;
	
    	public function init(Request $request)
    	{
    	    $this->_request = $request;
   		 }
    
	    public function indexAction()
    	{
    	    $this->useView("index");
       		$this->run();
	    }
	}
As you can see, the action naming is zend-like too. Just use a &lt;myName&gt;Action function inside your controller.

You can access the the action by surfing (by default) to: index.php?controller=myController&action=myAction. e.g.: index.php?controller=index&action=index

The indexAction is the default one. When just surfing to index.php?controller=index with no action given, it will always execute the indexAction

### Classes
##### Urlbuilder:
The Urlbuilder class builds, as the name says, urls. It's inside every controller. Grab it by using
	$builder = $this->getBuilder();
For the moment, i has only one function called buildUrl($controller, $action, $param).

$controller is the name of your controller. Obviously. 

$action the name of your action 

and $param additional parameters (associative array).

	echo $builder->buildUrl("index", "index");
will print out a url leading to indexController and indexAction. (index.php?controller=index&action=index)

Params will be added at the end.

	array(
		"foo" => "bar"
	)
will result in index.php?controller=index&action=index&foo=bar


##### Settings
The Settings class stores your settings. Define them inside Settings.php using key => value.

Access them with

	$settings = new Settings();
	$settings->get("key");
that's it.

By default you have "controller_prefix", "action_prefix", and "dispatcher" in your Settings.php

These tell the application how to access the parameters.
When changing to 
	"controller_prefix" => "bla" 
you always have to use
	index.php?bla=controllername&action=actionname
to access your Action.

Urlbuilder builds urls given to your controller / action schema.

##### Request
Just a class to store the request stuff.
Access them by using
	$request->get("key");
for get, and 
	$request->post("key");
for post.


### Helper

##### Helper inside a Controller
	$this->redirect("www.google.de"); // Redirects to a specific page
	$this->setHeader("Header"); // Sets a specific header
	$this->useView("view"); // Tell the app which view to use
	$this->useLayout("layout") // Say the app to use layouting 
##### Helper inside a View
	$_URLBUILDER // A instance of Urlbuilder Class
	$_TP // Used for accessing template vars
	$_CONTENT // Available in layouts. Renders a view inside the layout


### Views & Layouts

Views and layouts are, as expected, zend simmilar too. They are inside the view/ folder.

They are pure html / php.

Each Controller can use it's own view by using
	$this->setView("viewname");

Layouts are quite similar. A layout is a wrapper for view, also inside the view/ folder. Just write your HTML code and use 
	$_CONTENT
On the place you want. Each action using the layout, will render the views content inside the layout.
Enable it by using
	$this->useLayout("layout");


### What else?
Look inside the example controller, action and view. It should be self explainable!