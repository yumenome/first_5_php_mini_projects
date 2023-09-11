<?php
        include("mysql.php");
        $db = dbconnect();

        // pick up the full_url by name from form 
        $full_url = $_POST['full_url'];

        if(!empty($full_url) && filter_var($full_url, FILTER_VALIDATE_URL)){

            $ran_url = substr(md5(microtime()), rand(0,33),5);
        
            // check is there a url like that? 
            $result =$db->query("SELECT shorten_url FROM urls WHERE shorten_url	= '{$ran_url}'");
            if($result->rowCount() > 0){
                echo "smth went worng"; //if there's  
            }else{
                // get into db 
                $result = $db->query("INSERT INTO urls (shorten_url, full_url, clicks) VALUES ('{$ran_url}', '{$full_url}', '0')");
                
                if($result){
                    // take back form db 
                    $result = $db->query("SELECT shorten_url FROM urls WHERE shorten_url = '{$ran_url}'");

                    if($result->rowCount() > 0){
                        $row = $result->fetch();
                        echo ($row->shorten_url); //that's response!
                    }
                
                }
            }
        }else{
            echo "$full_url - invalid url!"; //that's response!
            
        }