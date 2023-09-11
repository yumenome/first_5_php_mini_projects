<?php 
     include("mysql.php");
     $db =dbconnect();
    //  if($db){
    //     echo "hipi";
    // }else{
    //     echo "eee";
    // }
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    // echo $fname, $lname, $email, $pwd;
    
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($pwd)  ){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //email valid?
            
            $answer = $db->query("SELECT email FROM users WHERE email = '{$email}' "); // already used?
            if($answer->rowCount() > 0){
                echo "sadly $email already used with another account!";
                return;
            }else{
                if(isset($_FILES['img'])){
                    $img_name = $_FILES['img']['name'];
                    $tmp_name = $_FILES['img']['tmp_name'];
                    // img_name . ext 
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);
                    $extensions = ['png', 'jpg', 'jpeg'];

                    if(in_array($img_ext, $extensions) === true){ //same ext?

                        $time= time();
                        $uinque_img_name = $time.$img_name;
                        
                        if(move_uploaded_file($tmp_name, "../upload_img/".$uinque_img_name)){ //filed uploaded?
                            
                            $status = "active now";
                            $random_id = rand(time(), 100000);
                            if(strlen($pwd) >= 5){                            
                                $result = $db->query("INSERT INTO users (unique_id, fname, lname, email, pwd, img, status) 
                                VALUES ({$random_id},'{$fname}','{$lname}','{$email}','{$pwd}','{$uinque_img_name}','{$status}')");
                                if($result){ //query ok?
                                    $valid = $db->query("SELECT * FROM users WHERE email = '{$email}' ");

                                    if($valid->rowCount() > 0){ //  have an acc?
                                        $row = $valid->fetch();
                                        session_start();
                                        $_SESSION['unique_id'] = $row->unique_id;
                                        // header("location: ../users.php");
                                        echo "done";

                                    }else{
                                        echo "eee";
                                    }
                                }
                            }else{
                                echo "at least 5 passwords please";
                            }
                        }
                    }else{
                        echo "please select image file!";
                    }
                }else{
                    echo "please add photo!";
                }
            }
        }else{
            echo "$email - invalid email!";
        }
    }else{
        echo "please add all required info!";
    }