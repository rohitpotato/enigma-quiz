<?php
  session_start();

  require 'helpers/system.php';
  require 'config/config.php';
  //autoloader
  function __autoload($class_name){
    require 'libraries/'.$class_name.".php";
  }
 ?>
