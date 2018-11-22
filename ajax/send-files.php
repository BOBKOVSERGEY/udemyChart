<?php
require __DIR__ . '/../init.php';
$obj = new Base();
if (isset($_FILES['file']['name'])) {
  $fileName = $_FILES['file']['name'];
  $tmpName = $_FILES['file']['tmp_name'];

  $storeFiles = '../assets/img';
  $extensions = ['jpg','jpeg', 'png', 'pdf', 'zip', 'docx', 'xlsx'];

  $getFileExtension = explode('.', $fileName);
  $getExtension = end($getFileExtension);

  if (!in_array($getExtension, $extensions)) {
    echo 'error';
  }
}