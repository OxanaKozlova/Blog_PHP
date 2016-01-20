<?php

function __autoload($classname)
{

    $classname = mb_strtolower($classname);
    switch ($classname) {
        case 'post':
            require_once ("../include/model/".$classname.".php");
            break;
        case 'config':
            require_once ("../config/".$classname.".php");
            break;
        case 'route':
            require_once ("../include/".$classname.".php");
            break;
        default:
            if(strpos($classname, 'controller', 0)===0){
              require_once("../include/controllers/".$classname.'.php');
              break;
            }elseif(strpos($classname, 'storage', 0)===0){
              require_once("../include/storage/".$classname.'.php');
              break;
            }
            require_once ("../include/".$classname.".php");
              break;
    }
}

 ?>
