<?php session_start();?>
<?php include "db.php";?>
<?php include "../functions.php"?>
<?php
    if(isset($_POST['login'])){
        assistantLogin($_POST['email'],$_POST['password']);
    }
?>
