<?php
    include("mysql.php");
    $db =dbconnect();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo $id;

    $db->query("DELETE FROM urls WHERE id=$id");

    header("location: index.php");
}
elseif(isset($_GET['delete'])){
    $db->query("DELETE FROM urls");
    
    header("location: index.php");
}