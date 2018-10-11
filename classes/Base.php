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

}