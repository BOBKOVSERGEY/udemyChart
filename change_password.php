<?php
require __DIR__ . '/init.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
}

$obj = new Base();

if (isset($_POST['change_password'])) {
  $currentPassword = $obj->security($_POST['current_password']);
  $newPassword = $obj->security($_POST['new_password']);
  $retypeNewPassword = $obj->security($_POST['retype_new_password']);

  $currentStatus = 1;
  $newStatus = 1;
  $retypeStatus = 1;

  if (empty($currentPassword)) {
    $currentPasswordError = 'Current Password is required';
    $currentStatus = '';
  }

  if (empty($newPassword)) {
    $newPasswordError = 'New Password is required';
    $newStatus = '';
  } else if (strlen($newPassword) < 5) {
    $newPasswordError = 'New Password is too short';
    $newStatus = '';
  }

  if (empty($retypeNewPassword)) {
    $retypeNewPasswordError = 'Retype New Password is required';
    $retypeStatus = '';
  } else if ($newPassword != $retypeNewPassword) {
    $retypeNewPasswordError = 'Passwords is not match';
    $retypeStatus = '';
  }

  if (!empty($currentStatus) && !empty($newStatus) && !empty($retypeStatus)) {

    if ($obj->normalQuery("SELECT password FROM users WHERE id = ?", [$_SESSION['user_id']])) {
      $row = $obj->fetchOne();

      $dbPassword = $row->password;

      if (password_verify($currentPassword, $dbPassword)) {
        if ($obj->normalQuery("UPDATE users SET password = ? WHERE id = ?", [password_hash($newPassword, PASSWORD_DEFAULT), $_SESSION['user_id']])) {
          echo 'success';
        }
      } else {
        $currentPasswordError = 'Please enter correct password';
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
    <title>Home</title>
  <?php
    include __DIR__ . '/components/css.php';
  ?>
</head>
<body>
  <?php
    include __DIR__ . '/components/nav.php';
  ?>
  <div class="chat-container">
    <?php
      include __DIR__ . '/components/sidebar.php';
    ?>
    <section id="right-area">
      <div class="form-section">
        <form action="<?php echo $_SERVER[PHP_SELF]?>" method="post">
          <div class="group">
            <h2 class="form-heading">Change Password</h2>
          </div>
          <div class="group">
            <input type="password" name="current_password" class="control" placeholder="Add current Password" value="<?php if (isset($currentPassword)) echo $currentPassword; ?>">
            <?php if (isset($currentPasswordError)) { ?>
              <div class="name-error error">
                <?php echo $currentPasswordError; ?>
              </div>
            <?php } ?>
          </div>
          <div class="group">
            <input type="password" name="new_password" class="control" placeholder="Create New Password" value="<?php if (isset($newPassword)) echo $newPassword; ?>">
            <?php if (isset($newPasswordError)) { ?>
              <div class="name-error error">
                <?php echo $newPasswordError; ?>
              </div>
            <?php } ?>
          </div>
          <div class="group">
            <input type="password" name="retype_new_password" class="control" placeholder="Retype New Password" value="<?php if (isset($retypeNewPassword)) echo $retypeNewPassword; ?>">
            <?php if (isset($retypeNewPasswordError)) { ?>
              <div class="name-error error">
                <?php echo $retypeNewPasswordError; ?>
              </div>
            <?php } ?>
          </div>
          <div class="group">
            <input type="submit" name="change_password" class="btn account-btn" value="Save Changes">
          </div>
        </form>
      </div>
    </section>
  </div>
<?php
  include __DIR__ . '/components/js.php';
?>
</body>
</html>