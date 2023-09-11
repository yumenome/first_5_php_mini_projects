<?php 
    include("mysql.php");
    $db = dbconnect();
    
    // ?u= means array([u] => aer33) change into /aer33
    //  and get it with $_GET -> array([/aer33] =>)  
    //  $key and kill / so -> are33 and query with that key


    $url= "";
    if(isset($_GET)){
        foreach($_GET as $key=>$val){
            print_r($_GET); //arrray([/aer33] =>)

            $url = str_replace('/', '', $key); //  aer33
            print_r($url);

            $statement = $db->prepare("SELECT full_url FROM urls WHERE shorten_url =:url");
            $statement->execute(["url" => $url]);

            if($statement->rowCount() > 0){
                //  +1 click 
                $click= $db->query("UPDATE urls SET clicks = clicks + 1 WHERE shorten_url = '{$url}'");
                $row = $statement->fetch();
    
                $full_url =$row->full_url;
                print_r ($full_url);
                header("location: $full_url");  
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shorter_url</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" style="width: 808px">
        <form action="#" method="post">
            <input type="text" name="full_url" placeholder="paste your long url:">
            <i class="uil uil-link"></i>
            <button class="short_btn">shorten</button>
        </form>


    <?php
        $result = $db->query("SELECT * FROM urls ORDER BY id DESC");
        $rows = $result->fetchAll();

        if($result->rowCount() > 0): ?>
            <div class="count">

                <?php 
                    $result = $db->query("SELECT COUNT(*) FROM urls");
                    //count total rows
                    $row = $result->fetch();

                    // total clicks 
                    $answer = $db->query("SELECT clicks FROM urls");
                    $clicks = $answer->fetchAll();
                    $total =0;
                    foreach($clicks as $c){
                        //$total for each row and add all for main-total;
                        $total = $c->clicks + $total;
                    }
                ?>  
                                        <!-- total row                              total clicks  -->
                <span>total links: <span><?= end($row)?></span> & total click: <span><?= $total ?></span></span>
                <a href="del.php?delete=all" style="text-decoration: none">clear_all</a>
            </div>


            <div class="url_area">
                <div class="title">
                    <li>shorten_url</li>
                    <li>original_url</li>
                    <li>clicks</li>
                    <li>action</li>
                </div>

        <?php foreach($rows as $row): ?>
            <div class="data">
                <li > 
                                <!-- shroten_url  -->
                    <a class="reload" href="http://localhost/shorten_link/<?php echo $row->shorten_url ?>" target="_blank">
                        <?php 
                            if('localhost/shorten_link/' .strlen($row->shorten_url) > 50) {
                                echo 'localhost/shorten_link/' .substr($row->shorten_url,0, 45);
                            }else{
                                echo 'localhost/shorten_link/' . $row->shorten_url;
                            }
                        ?>
                    </a>
                </li>

                <li>
                    <!-- full_url  -->
                    <?php 
                        if(strlen($row->full_url) > 50) {
                            echo substr($row->full_url,0, 45).'...';
                        }else{
                            echo $row->full_url;
                        }
                    ?>
                </li>

                <li><?= $row->clicks ?></li>
                <li><a href="del.php?id=<?= $row->id ?>">del</a></li>
            </div>
        <?php endforeach ?>
            </div>

        <?php endif ?>
    </div>

    <div class="blur_effect"></div>
    <div class="popup_box">
        <div class="info_box">your short link is ready!</div>
        <form action="#" class="popup_form">
            <label>edit your shorten url</label>
            <input type="text" spellcheck="false" value="">
            <span class="doma"></span>
            <i class="copy uil uil-copy-alt"></i>
            <button class="save_btn">save</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>