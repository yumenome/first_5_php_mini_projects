<?php 
    if(isset($_POST['button'])){
        $img_url = $_POST['img_url'];

        // initialize curl 
        $ch = curl_init($img_url);
        // curl_setopt(resource, option, true/false)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
        // execute it   
        $download_img = curl_exec($ch);
        curl_close($ch);

        // manage type and retun filename with attachment 
        header('Content-type: image/jpg');
        header('Content-Disposition: attachment;filename="bonk.jpg"');
        //and download file
        echo $download_img;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>img 0r thumbnail</title><script src="https://kit.fontawesome.com/558ca58e7e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <form action="index.php" method="POST">
        <header>download image or <br> youtube thumbnail</header>
        <div class="url_input">
            <span class="title">paste url:</span>
            <div class="field">
                <input type="text" placeholder="https://www.youtube.com/watch?v=" required>
                <input class="hidden_input" type="hidden" name="img_url">
                <span class="bottom_line"></span>
            </div>
        </div>
        <div class="preview_area">
            <img class="pre_img" src="">
            <i class="icon fas fa-cloud-download-alt"></i>                
            <span>for your preview</span>
        </div>
        <button type="submit" name="button">download now!</button>
    </form>
    
    <script src="script.js"></script>
</body>
</html>