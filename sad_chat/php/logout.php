<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include ("mysql.php");
        $db = dbconnect();
        $logout_id = $_GET['logout_id'];
        // echo $logout_id;
        if(isset($logout_id)){
            $status = "offline";
            $result = $db->query("UPDATE users SET status = '{$status}' WHERE unique_id= {$logout_id}");
            if($result){
                session_unset();
                header("location: ../login.php");
            }
        }else{
            header("location: ../users.php");
        }
    }else{
        header("location: ../login.php");
    }