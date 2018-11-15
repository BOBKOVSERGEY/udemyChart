<?php
require __DIR__ . '/../init.php';
$obj = new Base();
if (isset($_POST['sendMessage'])) {
  $message = $obj->security($_POST['sendMessage']);
  $userId = $_SESSION['user_id'];
  $msgType = 'text';
  if (!empty($message)) {
    if ($obj->normalQuery('INSERT INTO messages (message, msg_type, user_id) VALUES (?,?,?)', [$message, $msgType, $userId])) {
      echo json_encode(['status' => 'success']);
    }
  }
}