<?php
class testController
{
  public function init($request)
  {
      var_dump($request);
      echo "<br />";
  }

  public function hiAction()
  {
    echo "Hello World Action";
  }

}
