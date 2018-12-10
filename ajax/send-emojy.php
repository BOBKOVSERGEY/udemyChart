<?php
require __DIR__ . '/../init.php';
$obj = new Base();

if (isset($_POST['send-emojy'])) {
  $emojy = $_POST['send-emojy'];
  $msgType = 'emojy';
  $userId = $_SESSION['user_id'];

  if ($obj->normalQuery('INSERT INTO messages (message, msg_type, user_id) VALUES (?,?,?)', [$emojy, $msgType, $userId])) {
    echo json_encode(['status' => 'success']);
  }
}
