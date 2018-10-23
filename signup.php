<?php
include __DIR__ . '/init.php';
$obj = new Base();

if ($_POST['signup']) {
  $fullName = $obj->security($_POST['full_name']);
  $email = $obj->security($_POST['email']);
  $password = $obj->security($_POST['password']);

  $imgName = $_FILES['img']['name'];
  $imgTmp = $_FILES['img']['tmp_name'];
  $imgPath = "assets/img/";
  $extensions = ['jpg', 'jpeg', 'png'];
  $imgExt = explode('.', $imgName);
  $imgExtensions = end($imgExt);


  $nameStatus = 1;
  $emailStatus = 1;
  $passwordStatus = 1;
  $photoStatus = 1;

  if (empty($fullName)) {
    $nameError = 'Full name is required';
    $nameStatus = '';
  }

  if (empty($email)) {
    $emailError = 'Email is required';
    $emailStatus = '';
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailError = 'Invalid email format';
      $emailStatus = '';
    } else {
      if ($obj->normalQuery("SELECT email FROM users WHERE email = ?", [$email])) {
        if ($obj->countRows() == 0) {

        } else {
          $emailError = 'Sorry this email is exist';
          $emailStatus = '';
        }
      }
    }
  }

  if (empty($password)) {
    $passwordError = 'Password is required';
    $passwordStatus = '';
  } else if (strlen($password) < 5) {
    $passwordError = 'Password is too short';
    $passwordStatus = '';
  }

  if (empty($imgName)) {
    $imageError = 'Image is required';
    $photoStatus = '';
  } else if (!in_array($imgExtensions, $extensions)) {
    $imageError = 'Invalid image extension';
    $photoStatus = '';
  }

  if (!empty($nameStatus) && !empty($emailStatus) && !empty($passwordStatus) && !empty($photoStatus)) {

    // перемещаем файл и временной папки в указанную папку
    move_uploaded_file($imgTmp, "$imgPath/$imgName");
    $status = 0;
    if ($obj->normalQuery("INSERT INTO users (name, email, password, image, status) VALUES (?,?,?,?,?)", [$fullName, $email, password_hash($password, PASSWORD_DEFAULT), $imgName, $status])) {
      $obj->createSession('account_success', 'Your account is successfully created');
      header("Location: login.php");
    };

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
<div class="signup-container">
  <div class="account-left">
    <div class="account-text">
      <h1>Lets Chat</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
    </div>
  </div>
  <div class="account-right">
    <div class="form-area">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="group">
          <h2 class="form-heading">Create a new account</h2>
        </div>
        <div class="group">
          <input type="text" name="full_name" class="control" placeholder="Enter Full name..." value="<?php if (isset($fullName)) echo $fullName; ?>">
          <?php if (isset($nameError)) { ?>
            <div class="name-error error">
              <?php echo $nameError; ?>
            </div>
          <?php } ?>
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
          <label for="file" id="file-label"><i class="fas fa-cloud-upload-alt upload-icon"></i>Choose image</label>
          <input type="file" name="img" class="file" id="file">
          <?php if (isset($imageError)) { ?>
            <div class="name-error error">
              <?php echo $imageError; ?>
            </div>
          <?php } ?>
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
<?php
include __DIR__ . '/components/js.php';
?>
</body>
</html>