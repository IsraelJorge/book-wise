<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $validations = [];

  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $email_confirm = trim($_POST['email_confirm']);
  $password = trim($_POST['password']);

  if (strlen($name) == 0) {
    $validations[] = 'O nome é obrigatório.';
  }

  if (strlen($email) == 0) {
    $validations[] = 'O e-mail é obrigatório.';
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $validations[] = 'O e-mail é inválido.';
  }

  if ($email != $email_confirm) {
    $validations[] = 'O e-mail de confirmação está diferente.';
  }

  if (strlen($password) == 0) {
    $validations[] = 'O senha é obrigatória.';
  }

  if (strlen($password) < 8 || strlen($password) > 30) {
    $validations[] = 'A senha precisa ter entre 8 e 30 caracteres.';
  }

  if (sizeof($validations) > 0) {
    $_SESSION['validations'] = $validations;
    header('location: /login');
    exit();
  }

  $_SESSION['validations'] = null;


  (new DB())->query(
    query: 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)',
    params: [
      'name' => $_POST['name'],
      'email' => $_POST['email'],
      'password' => $_POST['password']
    ]
  );
}

header('location: /login?message=Registrado com sucesso!!!');
exit();
