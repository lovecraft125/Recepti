<?php
include '../libs/config.php';

use libs\Recepi;
use libs\database\conn\connection;
use libs\database\DB;
use libs\Author;


$controller = new controller\ViewController;

include 'includes/header.php';
include 'includes/sidebar.php';
$controller->home();
include 'includes/footer.php';


