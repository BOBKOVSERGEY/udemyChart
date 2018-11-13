<?php

if (!isset($_SESSION['user_id'])) {

  $obj = new Base();
  $obj->createSession('security', 'Sorry first you need to login!');

  header("Location: login.php");
}