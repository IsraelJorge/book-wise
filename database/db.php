<?php

class DB
{
  private static $db = null;

  public static function connect(): PDO
  {
    if (self::$db === null) {
      self::$db = new PDO('sqlite:database/db.sqlite');
      self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return self::$db;
  }

  public function query($query, $class = null, $params = [])
  {
    $prepare = self::connect()->prepare($query);

    if ($class) {
      $prepare->setFetchMode(PDO::FETCH_CLASS, $class);
    }

    $prepare->execute($params);

    return $prepare;
  }
}
