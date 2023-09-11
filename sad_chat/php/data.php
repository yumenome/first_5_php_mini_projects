<?php

$rows = $result->fetchAll();
foreach($rows as $row){

    $result = $db->query("SELECT * FROM messages WHERE 
                        (incoming_msg_id = {$row->unique_id} OR  outgoing_msg_id = {$row->unique_id}) AND 
                        (outgoing_msg_id = {$outgoing_id} OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1");
    $you = "";
    if($result->rowCount() > 0){
        $reso = $result->fetch();
        $answer = $reso->msg;
        ($outgoing_id == $reso->outgoing_msg_id) ? $you = "u: " : $you = "";
    }else{
        $answer = "no message yet!";
    }
    (strlen($answer) > 25) ? $msg = substr($answer, 0, 25). '...' : $msg = $answer;
    
    ($row->status == "offline") ? $offline = "offline" : $offline ="";
    // $output .= "re"; 
    // wtf '. ??? .' for esc string concat

    $output .= '<a href="chat.php?user_id='. $row->unique_id .' ">
                        <div class="content">
                        <img src= "./upload_img/'. $row->img .'">
                            <div class="details">
                                <span> '. $row->fname .' '. $row->lname .' </span> 
                                <p>'. $you . $msg .'</p>
                            </div>
                        </div>
                        <div class="status_dot ">
                            <i class="fas fa-circle '.$offline.' " ></i>
                        </div>
                    </a>';
}