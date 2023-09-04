<?php 
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();
require_once("Conn.php");
spl_autoload_register(function($class_name)
{
require_once("classes/$class_name.php");

});