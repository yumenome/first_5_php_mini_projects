<?php 
    include('head.php');
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: users.php");
    } 
?>
<body>
    <div class="container">
        <section class="form login">
            <header>sad chat..?</header>
            <form action="#">
                <div class="error_text">im error!</div>
                
                <div class="field input">
                    <label>email:</label>
                    <input type="text" name="email" placeholder="enter your email">
                </div>
                <div class="field input">
                    <label>password:</label>
                    <input type="password" name="pwd" class="pwd" placeholder="enter your password">
                    <i class="eye_icon fas fa-eye"></i>
                    <i class="eye_off fa-solid fa-eye-low-vision"></i>
                </div>

                <div class="field btn">
                    <input type="submit" value="containue to chat">
                </div>
            </form>
            <div class="link">not yet signed up? <a href="signup.php">signup now</a></div>
        </section>
    </div>

    <script src="javascript/pwd_show-hide.js"></script>
    <script src="javascript/login.js"></script>
</body>
</html>