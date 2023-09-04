<?php
// ini_set('display_errors', 1);

// ini_set('display_startup_errors', 1);

// error_reporting(E_ALL);
class Conn{
  public function connect()
  {
   $db_host = "localhost";
   $db_name = "loguser";
   $db_user = "cmss";
   $db_pass = "z[GnDzqdqj37/hBp";
   
   $dsn = 'mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8';

   try {
    $db = new PDO($dsn, $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
    }
}

