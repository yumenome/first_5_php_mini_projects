<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>file_upload</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/558ca58e7e.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h3>file uploader</h3>
        <form action="#">
            <input class="file_input" type="file" name="file" hidden>
            <img src="upload.png">
            <p>browse file to upload</p>
        </form>
        <section class="progress-area"></section>
        <section class="uploaded-area"></section>
    </div>


    <script src="script.js"></script>
</body>
</html>