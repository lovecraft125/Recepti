<?php 
    if(isset($_POST['submit'])){
        $email = trim(htmlentities($_POST['email']));
        $password = trim(htmlentities(hash('sha256',$_POST['password'])));
        
        $authors = libs\Author::find_all();
        foreach ($authors as $author){
            if($author->email === $email && $author->password === $password){
                libs\Session::setKey('id', $author->id);
                header('location: index.php');
            }else{
                $message = "Niste uneli odgovarajuce ime ili sifru";
            }
        }
    }
?>
<div id="content">             
    
    <div id="forma">
        <h3>Loguj se</h3>
        <form method="post">
            <table>
                <tr>
                    <td>Unesite email:</td>
                    <td><input type="text" name="email" placeholder="email....."></td>
                </tr>
                <tr>
                    <td>Unesite sifru</td>
                    <td><input type="password" name="password" placeholder="sifra....."></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Uloguj se"></td>
                </tr>
            </table>
            <?php if(isset($message)) echo $message;?>
        </form>
    </div>

</div>
