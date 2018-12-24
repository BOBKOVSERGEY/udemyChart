<?php
require __DIR__ . '/../init.php';
$obj = new Base();

if ($obj->normalQuery('SELECT * FROM users_activities')) {
  $users = $obj->fetchAll();

  foreach ($users as $user) {
    $userID = $user->user_id;
    $loginTime = $user->login_time;

    $currentTime = time();

    // разница во времени
    $timeDiff = $currentTime - $loginTime;

    $status = 0;

    if ($_SESSION['user_id'] == $userID) {
      if ($timeDiff > 1800) {
        $obj->normalQuery('UPDATE users SET status = ? WHERE id = ?', [$status, $userID]);
        unset($_SESSION['user_id']);

        echo json_encode(['status' => 'href']);
      }
    } else {
      if ($timeDiff > 1800) {
        $statusAgain = 1;
        $obj->normalQuery('UPDATE users SET status = ? WHERE id = ? AND status = ?', [$status, $userID, $statusAgain]);
      }
    }

  }
}

