<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Create new account</title>
  <?php
  include __DIR__ . '/components/css.php';
  ?>
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
          <h2 class="form-heading">User Login</h2>
        </div>
        <div class="group">
          <input type="email" name="email" class="control" placeholder="Enter Email...">
        </div>
        <div class="group">
          <input type="password" name="password" class="control" placeholder="Create Password...">
        </div>
        <div class="group">
          <input type="submit" name="login" class="btn account-btn" value="User login">
        </div>
        <div class="group">
          <a href="signup.php" class="link">Create a new account?</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
include __DIR__ . '/components/js.php';
?>
</body>
</html>