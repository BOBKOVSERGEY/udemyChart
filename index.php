<?php
require __DIR__ . '/init.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
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
  <?php if (isset($_SESSION['password_updated'])) {?>
    <div class="flash success-flash">
      <span class="remove">&times;</span>
      <div class="flash-heading">
        <h3><span class="checked--green">&#10004;</span> Success: you have done</h3>
      </div>
      <div class="flash-body">
        <p><?php echo $_SESSION['password_updated'];?></p>
      </div>
    </div>
  <?php }
  unset($_SESSION['password_updated']);
  ?>
  <?php if (isset($_SESSION['name_updated'])) {?>
    <div class="flash success-flash">
      <span class="remove">&times;</span>
      <div class="flash-heading">
        <h3><span class="checked--green">&#10004;</span> Success: you have done</h3>
      </div>
      <div class="flash-body">
        <p><?php echo $_SESSION['name_updated'];?></p>
      </div>
    </div>
  <?php }
  unset($_SESSION['name_updated']);
  ?>
  <!--<div class="flash error-flash">
    <span class="remove">&times;</span>
    <div class="flash-heading">
      <h3><span class="checked--red">&#x2715;</span> Error: you have error</h3>
    </div>
    <div class="flash-body">
      <p>First you need to login!</p>
    </div>
  </div>-->
    <?php
      include __DIR__ . '/components/nav.php';
    ?>
  <div class="chat-container">
    <?php
      include __DIR__ . '/components/sidebar.php';
    ?>
    <section id="right-area">
      <?php
        include __DIR__ . '/components/messages.php';
        include __DIR__ . '/components/chat_form.php';
        include __DIR__ . '/components/emoji.php';
      ?>
    </section>
  </div>
<?php
  include __DIR__ . '/components/js.php';
?>
</body>
</html>