<?php
Class Product extends Conn{
    private $p_name;
    private $p_quant;
    private $p_price;
    private $cat;
    public function __construct($p_name,$p_quant,$p_price,$cat)
    {
            $this->p_name=$p_name;
            $this->p_quant=$p_quant;
            $this->p_price=$p_price;
            $this->cat=$cat;

    }
    public function addProduct()
    {
        $stmt=$this->Connect()->prepare("INSERT INTO products (product_name,quantity,price,p_category) VALUES(?,?,?,?);");

    if(!$stmt->execute(array($this->p_name,$this->p_quant,$this->p_price,$this->cat)))
    {
        $stmt='null';
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
   $stmt=null;
             
    }
    public function updateProduct($p_id)
    {
        $stmt=$this->Connect()->prepare("UPDATE products SET product_name=?,quantity=?,price=? WHERE product_id=?;");

    if(!$stmt->execute(array($this->p_name,$this->p_quant,$this->p_price,$p_id)))
    {
        $stmt='null';
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
   $stmt=null;
             
    }
}