<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create new account</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:100,300,400,500,600,700,800,900&amp;subset=cyrillic" rel="stylesheet">
</head>
<body>
    <div class="signup-container">
        <div class="account-left">
            <h1>Account left</h1>
        </div>
        <div class="account-right">
            <div class="form-area">
                <form action="" method="post">
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
                        <label for="file" id="file-label">Choose image</label>
                        <input type="file" name="img" class="file" id="file">
                    </div>
                    <div class="group">
                        <input type="submit" name="signup" class="btn signup-btn" value="Create account">
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="assets/js/jquery.min.js"></script>
</body>
</html>