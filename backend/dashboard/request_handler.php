<?php
require "../Main.php";
$Main = new Main;

if(isset($_POST['p_add'])) {
    $Main->add_product($_POST,$_FILES);
}