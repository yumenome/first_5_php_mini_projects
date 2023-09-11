<?php
    session_start();
    include("mysql.php");
    $db = dbconnect();
    $search_term = $_POST['search_term'];
    $outgoing_id = $_SESSION['unique_id'];

    // echo $search_term;
    $output = "";

    $result =$db->query("SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$search_term}%' OR lname LIKE '%{$search_term}%')");
    if($result->rowCount() > 0){
        // $output .= "here you are";
        include("data.php");
    }else{
        $output .= "not found!";
    }
    echo $output;