<?php
include "../classes/Conn.php";
include "../classes/Log.php";
include "../classes/Category.php";

 $cats=new Category();
 $pcategories= $cats->getCategory();
?>
<form action="cat.php" method="post">
<label for="cid">Category</label>
        <select name="cid"required>
            <?php foreach($pcategories as $category) : ?>
                <? //var_dump($category); ?>
                <option value="<?= $category['p_category']; ?>"><?= $category['p_category']; ?></option>
            <?php endforeach; ?>
        </select><br>
        <button type="submit" name="submit">Show</button>