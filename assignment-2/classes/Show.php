<?php
 class Show extends Conn{
  public function showProducts()
    {
        $stmt= $this->Connect()->prepare("SELECT * FROM products;");
           $stmt->execute();
            $results=$stmt->fetchAll();
        if(!$results)
        {
            echo "No records";
        }
        else
        {
            return $results;
        }

    }
    public function deleteProducts($id)
    {
        $stmt=$this->Connect()->prepare("DELETE FROM products WHERE product_id= ?");

    if(!$stmt->execute(array($id)))
    {
        $stmt='null';
        header("location:../product.php?error=stmtfailed");
        exit();
    }
   else{
    echo "Successfully deleted";
   }
             
    } 
   }
    ?>