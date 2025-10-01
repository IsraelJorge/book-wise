<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  redirect('/');
}

if (!auth()) {
  abort(403);
}

$title = trim($_POST['title']);
$description = trim($_POST['description']);
$author = trim($_POST['author']);
$user_id = auth()->id;

$validation = Validation::validate([
  'title' => [
    'fieldName' => 'Titulo',
    'rules' => ['required', 'min:3']
  ],
  'author' => [
    'fieldName' => 'Autor',
    'rules' => ['required', 'min:3']
  ],
  'description' => [
    'fieldName' => 'Descrição',
    'rules' => ['required']
  ],
], compact('title', 'author', 'description'));

if ($validation->isInvalid()) {
  redirect("/my-books");
}

(new DB())->query(
  query: "INSERT INTO books (title, description, author, user_id) VALUES (:title, :description, :author, :user_id)",
  params: compact('title', 'description', 'author', 'user_id')
);

flash()->push('message', 'Livro cadastrado com sucesso!!!');
redirect('/my-books');
