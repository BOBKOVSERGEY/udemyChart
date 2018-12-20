<?php

class Base extends DB
{
  private $query;

  public function normalQuery($query, $param = null)
  {
    if (is_null($param)) {
      // подготавливаем запрос
      $this->query = $this->con->prepare($query);
      // выполняем запрос
      return $this->query->execute();
    } else {
      $this->query = $this->con->prepare($query);
      return $this->query->execute($param);
    }
  }

  public function countRows()
  {
    return $this->query->rowCount();
  }

  public function fetchAll()
  {
    return $this->query->fetchAll(PDO::FETCH_OBJ);
  }
  public function fetchOne()
  {
    return $this->query->fetch(PDO::FETCH_OBJ);
  }

  public function security($data)
  {
    return trim(strip_tags($data));
  }

  public function createSession($sessionName, $sessionValue)
  {
    $_SESSION[$sessionName] = $sessionValue;
  }

  public function timeAgo($dbMsgTime)
  {
    $dbTime = strtotime($dbMsgTime);

    date_default_timezone_set('Europe/Moscow');

    $currentTime = time();
    $seconds = $currentTime - $dbTime;

    // округляем в меньшую сторону
    $minutes = floor($seconds / 60); // 60
    $hours = floor($seconds / 3600); // 60 * 60
    $days = floor($seconds / 86400); // 24 * 60 * 60
    $weeks = floor($seconds / 604800); // 7 * 24 * 60 * 60
    $months = floor($seconds / 2592000); // 30 * 24 * 60 * 60
    $years = floor($seconds / 31536000); // 365 * 24 * 60 * 60

    if ($seconds <= 60) {

      return "Just Now";

    } else if ($minutes <= 60) {
      if ($minutes == 1) {
        return "One minute ago";
      } else {
        return $minutes . " minutes ago";
      }
    } else if ($hours <= 24) {
      if ($hours == 1) {
        return "One hour ago";
      } else {
        return $hours . " hours ago";
      }
    } else if ($days <= 7) {
      if ($days == 1) {
        return "One day ago";
      } else {
        return $days . " days ago";
      }
    } else if ($weeks <= 4.3) {
      if ($weeks == 1) {
        return "One week ago";
      } else {
        return $weeks . " weeks ago";
      }
    } else if ($months <= 12) {
      if ($months == 1) {
        return "One months ago";
      } else {
        return $months . " months ago";
      }
    } else {
      if ($years == 1) {
        return "One year ago";
      } else {
        return $years . " years ago";
      }
    }
  }



}