<?php 
    if(isset($_GET['logout'])) {
        session_destroy();
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Recept-online</title>
        <link rel="stylesheet" type="text/css" href="styles/css/style.css">
        <link href='https://fonts.googleapis.com/css?family=Dancing+Script:400,700' rel='stylesheet' type='text/css'>
    </head>
    <div id="wrapper">
        <!--POCETAK HEADER-->
        <div id="header">
            <div id="logo">
                <h3>Recepti</h3>
            </div>
            <div id="navbar">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <?php if(libs\Session::getKey('id')): ?>
                        <li><a href="index.php?page=dodaj_recept">Dodaj recept</a></li>
                        
                    <?php endif;?>
                    
                </ul>
            </div>
            <div id="login">
                <?php if(!libs\Session::getKey('id')):;?>
                <ul>
                    <li><a href="index.php?page=login">Uloguj se</a></li>
                    <li><a href="?page=insert_author">Registruj se</a></li>
                </ul>
                <?php else: ?>
                <p><?php
                    $person = libs\Author::find_by_id(\libs\Session::getKey('id'));
                    echo $person->first_name.' '.$person->last_name;
                ?></p>
                <p><a href="?logout">Izloguj se</a></p>
                <?php endif;?>
            </div>
        </div>
        <!--POCETAK MAIN-->
        <div id="main">
            <!--TOP -->
            <div id="top">
                <h1>Recepti-online</h1>
                <p>Najbolji kulinarski recepti za vasu a i tudju dusu!</p>
            </div>
        
        