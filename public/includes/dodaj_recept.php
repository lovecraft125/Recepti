<?php
if(isset($_POST['submit'])){
    $message = array();
    $values = array();
        if(empty($_FILES['image'])){
            $message[] = "Niste uneli silku, slika je obavezna!";
        }
        if($values['title']= libs\Validate::validate_string($_POST['title'])){
            true;
        }else{
            $message[] = "Naslov nije dobar";
        }
        if($values['content'] = libs\Validate::validate_string($_POST['content'])){
            true;
        }else{
            $message[] = "Opis nije dobar";
        }
        $values['author_id'] = urlencode(libs\Session::getKey('id'));
        $values['category_id'] = $_POST['category_id'];
        $recepi = new libs\Recepi();
        if(empty($message)){
            $recepi->upload_image($_FILES['image']);
            if(empty($recepi->errors())){
                $recepi->set_values($values);
                $recepi->insert();
                header('location: index.php');
            }else{
                $errors = $recepi->errors();
                foreach ($errors as $error){
                    $message[] = $error; 
                }
            }
        }
        
       
    
    
}

?>
<div id="content">             
    
    <div id="forma">
        <h3>Dodaj recept</h3>
        <form method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Naziv:</td>
                    <td><input type="text" name="title" placeholder="Naslov..."></td>
                </tr>
                <tr>
                    <td>Opis:</td>
                    <td><textarea name="content" rows="20" cols="100"></textarea></td>
                </tr>
                <tr>
                    <td>slika:</td>
                    <td><input type="file" name="image" ></td>
                </tr>
                <tr>
                    <td>Izaberi kategoriju:</td>
                    <td>
                        <select name="category_id">
                            <?php
                                $categories = libs\Category::find_all();
                                foreach ($categories as $category):
                            ?>
                            <option value="<?= $category->id?>"><?= $category->category;?></option>
                            <?php
                                endforeach;
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Unesi recept"></td>
                </tr>
            </table>
            <?php if(isset($message)){
                    for($i = 0; $i < sizeof($message);$i++){
                        echo "<p>".$message[$i]."</p>";
                    }
                }
            ?>
        </form>
    </div>
</div>