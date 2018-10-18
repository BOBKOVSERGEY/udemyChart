<?php
include __DIR__ . '/init.php';
$obj = new Base();



if ($obj->normalQuery("SELECT name FROM users")) {
  $rows = $obj->fetchAll();

  foreach ($rows as $result) {
    echo $result->name;
  }
}