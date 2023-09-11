<?php include('head.php');
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
?>
<body>
    <div class="container">
        <section class="users">
            <header>
            <?php                
                include('php/mysql.php');
                $db= dbconnect();
                $result =$db->query("SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                
                if($result->rowCount() > 0){
                    $row= $result->fetch();
                }
            ?>
                <div class="content">
                    <img src= "upload_img/<?= $row->img ?>">
                    <div class="details">
                        <span><?= $row->fname . " " . $row->lname ?></span>
                        <p style="font-size: 12px; font-weight: 600;"><?= $row->status ?></p>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?= $row->unique_id ?>" class="logout">logout></a>
            </header>

            <div class="search">
                <span class="text">select new friend with new conversation...</span>
                <input type="text" placeholder="enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>

            <div class="users_list"></div>
        </section>
    </div>
    <script src="javascript/users.js"></script>
</body>
</html>