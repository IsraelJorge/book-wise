<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
