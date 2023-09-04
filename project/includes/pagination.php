
<?php
$base = strtok($_SERVER["REQUEST_URI"], '?'); ?>
<nav>
        <ul class="pagination">
            <li class="page-item">
                <?php if($paginator->prev) : ?>
     <a class="page-link" href="?page=<?=$paginator->prev; ?>">PREV</a> </li>
     <?php endif; ?>
     <li class="page-item">
     <?php if($paginator->next) : ?>
       <a class="page-link" href="<?=$base;?>?page=<?=$paginator->next; ?>">NEXT</a></li>
        <?php else: ?>
            <span class="page-link">NEXT</span>
        <?php endif; ?>
        </ul>
        </nav>