<?php
    session_start();
    include("mysql.php");
    $db= dbconnect();
    if(isset($_SESSION['unique_id'])){
        $outgoing_id = $_POST['outgoing_id'];
        $incoming_id = $_POST['user_id'];
        $msg = $_POST['msg'];
        echo $incoming_id . $msg;
        
        $result = $db->prepare("INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)                  
                              VALUES (:income, :outgo, :msg)");
        $result->execute([
            "income" => $incoming_id,
            "outgo" => $outgoing_id,
            "msg" => "$msg"
        ]);
    }else{
        header("locaton: ../login.php");
    }