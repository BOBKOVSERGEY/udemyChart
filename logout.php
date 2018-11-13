<?php
require __DIR__ . '/init.php';

$obj = new Base();
$status = 0;
$user_id = $_SESSION['user_id'];
if ($obj->normalQuery('UPDATE users SET status = ? WHERE id = ?', [$status, $user_id])) {
  session_destroy();
  header("Location: login.php");
}
