<?php
require __DIR__ . '/init.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
}

$obj = new Base();

if (isset($_POST['change_img'])) {

  $imgName = $_FILES['change_img']['name'];
  $imgTmp = $_FILES['change_img']['tmp_name'];
  $imgPath = "assets/img/";
  $extensions = ['jpg', 'jpeg', 'png'];
  $imgExt = explode('.', $imgName);
  $imgExtensions = end($imgExt);

  if (empty($imgName)) {
    $imageError = "Please choose the image";
  } else if (!in_array($imgExtensions, $extensions)) {
    $imageError = "Please choose the valid extension";
  } else {
    move_uploaded_file($imgTmp, "$imgPath/$imgName");

    if ($obj->normalQuery('UPDATE users SET image = ? WHERE id = ?', [$imgName, $_SESSION['user_id']])) {
      $obj->createSession('update_image', 'Your photo is successfully updated!');
      $obj->createSession('user_image', $imgName);
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
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <div class="group">
          <h2 class="form-heading">Change Photo</h2>
        </div>
        <div class="group">
          <label for="change-image" id="change-image-label"></label>
          <input type="file" name="change_img" class="file" id="change-image">
          <?php if (isset($imageError)) { ?>
            <div class="name-error error error--left">
              <?php echo $imageError; ?>
            </div>
          <?php } ?>
        </div>
        <div class="group">
          <input type="submit" name="change_img" class="btn account-btn" value="Save Changes">
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