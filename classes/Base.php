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



}