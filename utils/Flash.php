<?php

class Flash
{
  public function push($key, $value)
  {
    $_SESSION["flash_$key"] = $value;
  }

  public function get($key)
  {
    if (!$_SESSION["flash_$key"]) {
      return null;
    }

    $value = $_SESSION["flash_$key"];

    unset($_SESSION["flash_$key"]);

    return $value;
  }
}
