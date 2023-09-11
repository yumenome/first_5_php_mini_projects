<?php
    session_start();
    include("mysql.php");
    $db= dbconnect();
    $outgoing_id = $_SESSION['unique_id'];
    $result =$db->query("SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}");
    $output= "";
                    
    if($result->rowCount() == 0){
        $output .= "no users yet!";
                                // ?
    }elseif($result->rowCount() > 0 ){
            include("data.php");
    }echo $output;