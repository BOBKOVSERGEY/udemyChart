<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create new account</title>
  <link rel="stylesheet" href="assets/css/style.css?v=1">
  <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,700&amp;subset=cyrillic" rel="stylesheet">
</head>
<body>
    <div class="signup-container">
        <div class="account-left">
            <div class="account-text">
                <h1>Lets Chat</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
            </div>
        </div>
        <div class="account-right">
            <div class="form-area">
                <form action="" method="post">
                    <div class="group">
                        <h2 class="form-heading">Create a new account</h2>
                    </div>
                    <div class="group">
                        <input type="text" name="full_name" class="control" placeholder="Enter Full name...">
                    </div>
                    <div class="group">
                        <input type="email" name="email" class="control" placeholder="Enter Email...">
                    </div>
                    <div class="group">
                        <input type="password" name="password" class="control" placeholder="Create Password...">
                    </div>
                    <div class="group">
                        <label for="file" id="file-label"><i class="fas fa-cloud-upload-alt upload-icon"></i>Choose image</label>
                        <input type="file" name="img" class="file" id="file">
                    </div>
                    <div class="group">
                        <input type="submit" name="signup" class="btn account-btn" value="Create account">
                    </div>
                    <div class="group">
                        <a href="login.php" class="link">Already have an account?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/file_label.js"></script>
</body>
</html>