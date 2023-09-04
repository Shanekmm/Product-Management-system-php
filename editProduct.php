
<?php
include "classes/Conn.php";
include "classes/Product.php";
// include "classes/Classes.php";
Log::requireLogIn();
?>

<h4>Add products</h4>
    <form action="includes/newProduct.php" method="post">
    <label for="name">Product Name:</label>
        <input type="text" name="pname" id="pname"><br>
        <label for="quantity">Enter the stock quantity </label>
        <input type="text" name="quantity" id="quantity">"><br>
        <label for="price">Enter price of single quantity </label>
        <input type="text" name="price" id="price" placeholder="price" ><br>
        <button type="submit" name="submit">Update</button>
     </form>