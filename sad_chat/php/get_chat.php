<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include("mysql.php");
        $db= dbconnect();
        // $incoming_id = 1495063680;
        // $outgoing_id = 301983707;
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = $_POST['user_id'];
        // $outgoing_id = $_POST['outgoing_id'];
        // $incoming_id = ;
        // echo $_POST['incoming_id']; 
        // echo $incoming_id;
        // echo $outgoing_id;
        
        $result = $db->query("SELECT * FROM messages 
                             LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id WHERE 
                            (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id ={$incoming_id}) OR (outgoing_msg_id= {$incoming_id} AND incoming_msg_id = {$outgoing_id})
                            ORDER BY msg_id ");
        $output ="";

        if($result->rowCount() > 0){
            $rows = $result->fetchAll();
            
            foreach($rows as $row){
                if($row->outgoing_msg_id === $outgoing_id){ //sender
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'.$row->msg.'</p>
                                    </div>
                                </div>';

                
                }else{
                    $output .= '<div class="chat incoming">
                

                                    <img src= "./upload_img/'. $row->img .'">
                                    <div class="details">
                                        <p>'.$row->msg.'</p>
                                    </div>
                                </div>';
                }
            }
            echo $output;
        }
    }else{
        header("location: ../login.php");
    }