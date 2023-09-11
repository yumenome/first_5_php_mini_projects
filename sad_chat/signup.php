<?php 
    include('head.php');
    // session_start();
    // if(isset($_SESSION['unique_id'])){
    //     header("location: users.php");
    // } 
?>
<body>
    <div class="container">
        <section class="form signup">
            <header>sad chat..?</header>
            <form action="#">
                <div class="error_text">im error!</div>
                
                <div class="name_details">
                    <div class="field input">
                        <label>first name:</label>
                        <input type="text" name="fname" placeholder="first name" required>
                    </div>
                    <div class="field input">
                        <label>last name:</label>
                        <input type="text" name="lname" placeholder="last name" required>
                    </div>
                </div>

                <div class="field input">
                    <label>email:</label>
                    <input type="text" name="email"  placeholder="email" required>
                </div>
                <div class="field input">
                    <label>password:</label>
                    <input type="password" name="pwd" class="pwd" placeholder="password" required>
                    <i class="eye_icon fas fa-eye"></i>
                    <i class="eye_off fa-solid fa-eye-low-vision"></i>
                </div>
                
                <div class="field image">
                    <label>select photo:</label>
                    <input type="file" enctype="multipart/form-data" accept="image/*" name="img">
                </div>
                <div class="field btn">
                    <input type="submit" value="containue to chat">
                </div>
            </form>
            <div class="link">already signed up? <a href="login.php">login now</a></div>
        </section>
    </div>

    <script src="javascript/pwd_show-hide.js"></script>
    <script src="javascript/signup.js"></script>
</body>
</html>