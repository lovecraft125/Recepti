<?php 
    
    $recepi_num = (int)libs\Recepi::count_all();
    $page = !empty($_GET['cur_page'])?$_GET['cur_page']:1;
    $per_page = 2;
    $pagination = new libs\Pagination($page, $per_page, $recepi_num);
    
    try{
        $sql = "SELECT * FROM recepies ORDER BY id DESC LIMIT {$pagination->offset()}, {$per_page} ";
        $recepti = libs\Recepi::find_by_sql($sql); 
    }catch(PDOException $e){
        echo 'error:'.getMessage();
    }
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
                <div class="pagination">
                    <?php
                        if($pagination->total_pages() > 1){
                            if($pagination->has_previous_page()){
                                echo "<a href=\"index.php?page=main&cur_page={$pagination->previous()}\">Prethodna strana</a>";
                            }
                            for($i = 1; $i <= $pagination->total_pages(); $i++){
                                echo "<a href=\"index.php?page=main&cur_page={$i}\">{$i}</a>";
                            }
                            if($pagination->has_next_page()){
                                echo "<a href=\"index.php?page=main&cur_page={$pagination->next()}\">Naredna strana</a>";
                            }
                        }
                    ?>
                </div>
            </div>
        
            
          