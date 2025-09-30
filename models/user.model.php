<?php

class User
{
  public int $id;
  public string $name;
  public string $email;
  public string $password;

  function __construct($data = null)
  {
    if ($data !== null) {
      if (is_array($data)) {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->password = $data['password'];
      } elseif (is_object($data)) {
        $this->id = $data->id;
        $this->name = $data->name;
        $this->email = $data->email;
        $this->password = $data->password;
      }
    }
  }
}
