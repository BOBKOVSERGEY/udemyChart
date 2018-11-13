<?php
require __DIR__ . '/init.php';
$obj = new Base;
if (isset($_POST['login'])) {
  $email = $obj->security($_POST['email']);
  $password = $obj->security($_POST['password']);

  $emailStatus = 1;
  $passwordStatus = 1;

  if (empty($email)) {
    $emailError = 'Email is required';
    $emailStatus = '';
  }

  if (empty($password)) {
    $passwordError = 'Password is required';
    $passwordStatus = '';
  }

  if (!empty($emailStatus) && !empty($passwordStatus)) {
    if ($obj->normalQuery("SELECT * FROM users WHERE email = ?", [$email])) {

      if ($obj->countRows() == 0) {
        $emailError = 'Please enter correct email';
      } else {
        $row = $obj->fetchOne();
        $dbEmail = $row->email;
        $dbPassword = $row->password;
        $userId = $row->id;
        $userName = $row->name;
        $userImage = $row->image;


        if (password_verify($password, $dbPassword)) {
          $status = 1;
          $obj->normalQuery('UPDATE users SET status = ? WHERE id = ?', [$status, $userId]);
          $obj->createSession('user_name', $userName);
          $obj->createSession('user_id', $userId);
          $obj->createSession('user_image', $userImage);
          header("Location: index.php");
        } else {
          $passwordError = 'Please enter correct password';
        }

      }

    }
  }
}
?>
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
<?php if (isset($_SESSION['security'])) {?>
  <div class="flash error-flash">
    <span class="remove">&times;</span>
    <div class="flash-heading">
      <h3><span class="checked--red">&#x2715;</span> Error: you have error</h3>
    </div>
    <div class="flash-body">
      <p><?php echo $_SESSION['security']; ?></p>
    </div>
  </div>
<?php } unset($_SESSION['security']); ?>
<div class="signup-container">
  <div class="account-left">
    <div class="account-text">
      <h1>Lets Chat</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
    </div>
  </div>
  <div class="account-right">
    <div class="form-area">
      <?php if (isset($_SESSION['account_success'])) { ?>
        <div class="alert alert-success">
          <?php echo $_SESSION['account_success']; ?>
        </div>
      <?php } unset($_SESSION['account_success']);?>
      <form action="<?php echo $_SERVER[PHP_SELF]?>" method="post">
        <div class="group">
          <h2 class="form-heading">User Login</h2>
        </div>
        <div class="group">
          <input type="email" name="email" class="control" placeholder="Enter Email..." value="<?php if (isset($email)) echo $email; ?>">
          <?php if (isset($emailError)) { ?>
            <div class="name-error error">
              <?php echo $emailError; ?>
            </div>
          <?php } ?>
        </div>
        <div class="group">
          <input type="password" name="password" class="control" placeholder="Create Password..." value="<?php if (isset($password)) echo $password; ?>">
          <?php if (isset($passwordError)) { ?>
            <div class="name-error error">
              <?php echo $passwordError; ?>
            </div>
          <?php } ?>
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