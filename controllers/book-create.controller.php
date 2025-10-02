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
$userId = auth()->id;
$nameFile = $_FILES['image']['name'];

$validation = Validation::validate([
  'nameFile' => [
    'fieldName' => 'Imagem',
    'rules' => ['required']
  ],
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
], compact('title', 'author', 'description', 'nameFile'));

if ($validation->isInvalid()) {
  redirect("/my-books");
}

$dir = "images/";
$file = $dir .  basename($nameFile);
$newName = md5(rand());
$extension = pathinfo($file, PATHINFO_EXTENSION);
$imageUrl = "$dir$newName.$extension";

move_uploaded_file($_FILES['image']['tmp_name'], $imageUrl);

(new DB())->query(
  query: "INSERT INTO books (title, description, author, user_id, image_url) VALUES (:title, :description, :author, :userId, :imageUrl)",
  params: compact('title', 'description', 'author', 'userId', 'imageUrl')
);

flash()->push('message', 'Livro cadastrado com sucesso!!!');
redirect('/my-books');
