<?php

$message = $_REQUEST['message'] ?? '';
$validations = $_SESSION['validations'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);


  $user = (new DB())
    ->query(
      query: 'SELECT * FROM users where email = :email AND password = :password',
      class: User::class,
      params: ['email' => $email, 'password' =>  $password]
    )->fetch();



  if ($user) {
    $_SESSION['auth'] = $user;
    $_SESSION['message'] = "Seja bem vindo {$user->name}!!";
    header('location: /');
    exit();
  }
}

view(
  "login",
  [
    'message' => $message,
    'validations' => $validations
  ]
);
