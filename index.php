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