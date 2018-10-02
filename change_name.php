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
        <form action="" method="post">
          <div class="group">
            <h2 class="form-heading">Change Name</h2>
          </div>
          <div class="group">
            <input type="text" name="user_name" class="control" placeholder="Name...">
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