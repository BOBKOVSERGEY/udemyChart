<?php
require __DIR__ . '/../init.php';
$obj = new Base();
if (isset($_FILES['file']['name'])) {
  $fileName = $_FILES['file']['name'];
  $tmpName = $_FILES['file']['tmp_name'];

  $storeFiles = '../assets/img';
  $extensions = ['jpg','jpeg', 'png', 'PDF', 'zip', 'docx', 'xlsx', 'rtf'];

  $getFileExtension = explode('.', $fileName);
  $getExtension = end($getFileExtension);

  if (!in_array($getExtension, $extensions)) {
    echo 'error';
  } else {
    $userId = $_SESSION['user_id'];
    move_uploaded_file($tmpName, "$storeFiles/$fileName");

    if ($obj->normalQuery('INSERT INTO messages (message, msg_type, user_id) VALUES (?,?,?)', [$fileName, $getExtension,$userId])) {
      echo 'success';
    }
  }
}