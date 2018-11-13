<?php
require __DIR__ . '/init.php';

require __DIR__ . '/security.php';

$obj = new Base();

if (isset($_POST['change_name'])) {
  $userName = $obj->security($_POST['user_name']);

  if (empty($userName)) {
    $userNameError = 'Sorry name is required';
  } else if ($userName === $_SESSION['user_name'] ) {
    $userNameError = 'Sorry is not different';
  } else {
    if ($obj->normalQuery("UPDATE users SET name = ? WHERE id = ?", [$userName, $_SESSION['user_id']])) {
      $obj->createSession('user_name', $userName);
      $obj->createSession('name_updated', 'Your name is successfully updated');
      header('Location: index.php');
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
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
          <div class="group">
            <h2 class="form-heading">Change Name</h2>
          </div>
          <div class="group">
            <input type="text" name="user_name" class="control" placeholder="Name..." value="<?php echo $_SESSION['user_name']?>">
            <?php if (isset($userNameError)) { ?>
              <div class="name-error error">
                <?php echo $userNameError; ?>
              </div>
            <?php } ?>
          </div>
          <div class="group">
            <input type="submit" name="change_name" class="btn account-btn" value="Save Changes">
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