<?php

$message = $_REQUEST['message'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);


  $validation = Validation::validate([
    'email' => [
      'fieldName' => 'E-mail',
      'rules' => ['required', 'email',]
    ],
    'password' => [
      'fieldName' => 'Senha',
      'rules' => ['required', 'min:6', 'max:30']
    ]
  ], [
    'email' => $email,
    'password' => $password
  ]);

  if ($validation->isInvalid('login')) {
    header('location: /login');
    exit();
  }

  $user = (new DB())
    ->query(
      query: 'SELECT * FROM users where email = :email AND password = :password',
      class: User::class,
      params: ['email' => $email, 'password' =>  $password]
    )->fetch();



  if ($user) {
    $_SESSION['auth'] = $user;
    flash()->push('message', "Seja bem vindo {$user->name}!!");
    header('location: /');
    exit();
  }
}

view("login",);
