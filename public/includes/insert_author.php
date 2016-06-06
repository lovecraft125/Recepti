<?php
    if(isset($_POST['submit'])){
        $value=array();
        $message =  array();
//        Proverava ime
        ;
        if($value['first_name'] = \libs\Validate::validate_string($_POST['first_name'])){
            true;
        }else{
            $message[] = 'Neodgovarajuce ime!';
        }
        //Proverava prezime
        if($value['last_name'] = \libs\Validate::validate_string($_POST['last_name'])){
            true;
        }else{
            $message[] = 'Neodgovarajuce prezime';
        }
        //Proverava mail
        if($value['email'] = \libs\Validate::validate_email($_POST['email'])){
            true;
        }else{
            $message[] = 'Neodgovarajuci email!';
        }
        
        if($value['password'] = \libs\Validate::validate_password($_POST['password'])){
            true;
        }else{
            $message[] = 'Neodgovarajuca sifra';
        }
        if(empty($message)){
            $author = new libs\Author();
            $author->set_values($value);
            $author->insert();
            header("location: index.php");
        }
     }
    
?>
<div id="content">             
    
    <div id="forma">
        <h3>Registruj se</h3>
        <form method="post">
            <table>
                <tr>
                    <td>Unesite ime:</td>
                    <td><input type="text" name="first_name" placeholder="Ime....."></td>
                </tr>
                <tr>
                    <td>Unesite prezime:</td>
                    <td><input type="text" name="last_name" placeholder="Prezime....."></td>
                </tr>
                <tr>
                    <td>Unesite email:</td>
                    <td><input type="text" name="email" placeholder="email....."></td>
                </tr>
                <tr>
                    <td>Unesite sifru</td>
                    <td><input type="password" name="password" placeholder="sifra....."></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Registruj se"></td>
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
