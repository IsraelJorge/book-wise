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
    redirect('/login');
  }

  $user = (new DB())
    ->query(
      query: 'SELECT * FROM users where email = :email',
      class: User::class,
      params: ['email' => $email,]
    )->fetch();



  if ($user) {
    $passwordDatabaseHash = $user->password;

    if (!password_verify($password, $passwordDatabaseHash)) {
      flash()->push('validations_login', ['E-mail ou senha estão incorretos.']);
      redirect('/login');
    }

    $_SESSION['auth'] = $user;
    flash()->push('message', "Seja bem vindo {$user->name}!!");
    redirect('/');
  }
}

view("login",);
