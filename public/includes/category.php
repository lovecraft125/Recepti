<?php
$id= urldecode($_GET['cat']);
$sql = "SELECT * FROM recepies WHERE category_id = {$id} ORDER BY date DESC";
$recepti = libs\Recepi::find_by_sql($sql);

?>
<!--CONTENT-->
            <div id="content">    
                <?php foreach($recepti as $recept):?>
                <?php 
                    $author = libs\Author::find_by_id($recept->author_id);
                ?>
                <div class="article">
                    <h3><?= $recept->title;?></h3>
                    <img style="width:300px; margin:20px;" src="images/recepies/<?= $recept->image;?>" alt="<?= $recept->title?>">
                    <p><?= substr($recept->content, 0,400).'......';?></p>
                    <p class="author"><span class="date"><?= $recept->date;?></span><?= $author->first_name.' '.$author->last_name; ?></p>
                    <p class="view_more" ><a href="index.php?page=single_page&id=<?= $recept->id;?>">Pogledaj Recept</a></p>
                </div>
                <?php endforeach;?>
            </div>