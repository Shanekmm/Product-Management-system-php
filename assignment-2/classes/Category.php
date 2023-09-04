<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
//include "../classes/Conn.php";

class Category Extends Conn
{
    public function getCategory()
    {
        $sql = "SELECT distinct(p_category)
                FROM products;";

$stmt= $this->Connect()->prepare($sql);
$stmt->execute();
 $results=$stmt->fetchAll();
if(!$results)
{
 echo "No records";
}
else
{
   // var_dump($results);
 return $results;
}
    }
    public function productByCategory($cat)
    {
        $sql = "SELECT * from products
                WHERE p_category=?;";

$stmt= $this->Connect()->prepare($sql);
$stmt->execute(array($cat));
 $results=$stmt->fetchAll();
if(!$results)
{
 echo "No products";
}
else
{
   // var_dump($results);
 return $results;
}
    }
}