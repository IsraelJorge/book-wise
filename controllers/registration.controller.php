<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $email_confirm = trim($_POST['email_confirm']);
  $password = trim($_POST['password']);

  $validation = Validation::validate([
    'name' => [
      'fieldName' => 'Nome',
      'rules' => ['required']
    ],
    'email' => [
      'fieldName' => 'E-mail',
      'rules' => ['required', 'email', 'confirmed']
    ],
    'password' => [
      'fieldName' => 'Senha',
      'rules' => ['required', 'min:6', 'max:30']
    ]
  ], [
    'name' => $name,
    'email' => $email,
    'email_confirm' => $email_confirm,
    'password' => $password
  ]);



  if ($validation->isInvalid('register')) {
    header('location: /login');
    exit();
  }

  (new DB())->query(
    query: 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)',
    params: [
      'name' => $name,
      'email' => $email,
      'password' => $password
    ]
  );
}

flash()->push('message', "Registrado com sucesso!!!");
header('location: /login');
exit();
