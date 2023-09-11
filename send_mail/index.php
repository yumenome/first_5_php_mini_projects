<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>send_mail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 mail">
                <h3 class="text-center">send mail to everyone form localhost</h3>
<?php
    if(isset($_POST['submit'])){
                        
        $recipient = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $sender = "From: davidhlasein@gmail.com";

        if(empty($recipient) || empty($subject) || empty($message)): ?>
            <div class="alert alert-danger text-center">
                <?php echo "All inputs are required!" ?>
            </div>
        <?php else : ?>

            <?php if(mail($recipient, $subject, $message, $sender)) : ?>
                 <div class="alert alert-success text-center">                        <?php echo "Your mail successfully sent to $recipient"?>
                </div>
            <?php else : ?>
                <div class="alert alert-danger text-center">
                     <?php echo "Failed while sending your mail!" ?>
                </div>
            <?php endif ?>

        <?php endif ?> 
    <?php } ?>

                <form action="index.php" method="post">
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="recipient">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="subject" placeholder="subject">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control textarea" name="message"  cols="30" rows="10" placeholder="compose ur message..."></textarea>
                    </div>
                    <div class="form-group">
                        <input class="form-control  btn btn-primary" type="submit" name="submit" value="send">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

