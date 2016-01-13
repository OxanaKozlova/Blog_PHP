<?php

class Route{
  static function choose_action(){
    $controller_name = "blog";
    $action_name = "index";
    if(!empty($_GET['action'])){
      $action_name = $_GET['action'];
    }

    $controller_name = "Controller_".$controller_name;
    $action_name = 'action_'.$action_name;

    $controller = new $controller_name;

    $action  = $action_name;
    if(method_exists($controller, $action)){
        $controller->$action();
        require_once("../view/index.html.php");
    }
  }
}
