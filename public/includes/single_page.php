<?php 
    if(isset($_POST['submit'])){
        $values = array();
        $author = libs\Author::find_by_id(libs\Session::getKey('id'));
        $values['author'] = $author->first_name.' '.$author->last_name;
        $values['recepie_id'] = $_POST['recepie_id'];
        $values['comment'] = libs\Validate::validate_string($_POST['comment']);
        
        $comment = new \libs\Comment();
        $comment->set_values($values);
        $comment->insert();
        
        header("location: index.php?page=single_page&id={$_GET['id']}");
    }
    if(!isset($_GET['id'])){
        header('location: index.php');
    }
    $recept = libs\Recepi::find_by_id($_GET['id']);
?>
          <!--*****************************-->
            <div id="content">    
                
                <?php 
                    $author = libs\Author::find_by_id($recept->author_id);
                ?>
                <div class="article single">
                    <h3 style="text-align: center;"><?= $recept->title;?></h3>
                    <img  src="images/recepies/<?= $recept->image;?>" alt="<?= $recept->title?>">
                    <p><?= $recept->content;?></p>
                    <p class="author"><span class="date"><?= $recept->date;?></span><?= $author->first_name.' '.$author->last_name; ?></p>
                </div>
                <?php 
                    $sql = "SELECT * FROM comments WHERE recepie_id = {$_GET['id']}";
                    if(!empty($komentari = libs\Comment::find_by_sql($sql))):
                ?>
                <div id="komentari">
                    <h3>Komentari</h3>
                    
                        <?php 
                            foreach ($komentari as $komentar){
                        ?>
                    <div class="komentar">
                        <h4>Autor: &nbsp;<?= $komentar->author;?></h4>
                        <p><?= $komentar->comment;?></p>
                        <p>Datum:<?=$komentar->date;?></p>
                    </div>
                        <?php
                            }
                        ?>
                    
                </div>
                <?php endif;?>
                <?php if(\libs\Session::getKey('id')):?>
                <div id="dodaj_komentar">
                    <form method="post">
                        <label>Ostavi komentar:</label><br><br>
                        <textarea name="comment" cols="30"></textarea>
                        <input type="hidden" name="recepie_id" value="<?=$_GET['id'];?>">
                        <input type="submit" name="submit" value="Ostavi komentar">
                    </form>
                </div>
                <?php endif;?>
            </div>