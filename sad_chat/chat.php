<?php include('head.php');
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
    $current_user_id = $_SESSION['unique_id'];
?>
<body>
    <div class="container">
        <section class="chat_area">
            <header>
            <?php                
                include('php/mysql.php');
                $db= dbconnect();
                $selected_user_id = $_GET['user_id'];
                $result =$db->query("SELECT * FROM users WHERE unique_id = {$selected_user_id}");
                
                if($result->rowCount() > 0){
                    $row= $result->fetch();
                }
            ?>
                <a href="users.php" class="back_icon"><i class="fa-solid fa-chevron-left"></i></a>
                <img src= "upload_img/<?= $row->img ?>">
                    <div class="details">
                        <span><?= $row->fname . " " . $row->lname ?></span>
                        <p><?= $row->status ?></p>
                </div>
            </header>

            <div class="chat_box">
            </div>
            
            <form action="#" class="text_box">
        <!-- sender  -->
                <input type="text" name="outgoing_id" value="<?= $current_user_id ?>" hidden> 
        <!-- receiver  -->
                <input type="text" name="user_id" value="<?= $_GET['user_id'] ?>" hidden>
                <input type="text" name="msg" class="input_field" placeholder="let's start...">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>

    <script src="javascript/chat.js"></script>
</body>
</html>