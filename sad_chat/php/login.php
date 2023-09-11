<?php

    include('mysql.php');
    $db= dbconnect();
    $email= $_POST['email'];
    $pwd= $_POST['pwd'];

    // echo $email . $pwd;
    if(!empty($email) && !empty($pwd)){

        $result = $db->query("SELECT * FROM users WHERE email = '{$email}' AND pwd = '{$pwd}'");
        if($result->rowCount() > 0){
            $row = $result->fetch();
            $status= "active now";
            $reso = $db->query("UPDATE users SET status = '{$status}' WHERE unique_id= {$row->unique_id}");
            if($reso){
                session_start();
                $_SESSION['unique_id'] = $row->unique_id;
                echo "done";
            }
        }else{
            echo "email or password is incorrect!";
        }
    }else{
        echo "all input fields are required!";
    }