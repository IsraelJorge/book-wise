<?php
class DB
{
  private static $db = null;
  private static $_config = null;

  public static function setConfig($config)
  {
    self::$_config = $config;
  }

  public static function connect(): PDO
  {
    if (self::$db === null) {
      $connectionString = self::$_config['drive'] . ':' . self::$_config['srcDB'];

      self::$db = new PDO($connectionString);
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
