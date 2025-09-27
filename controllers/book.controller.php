<?php

$id = $_REQUEST['id'];

$book =  (new DB())
  ->query(
    query: 'SELECT * FROM books WHERE id = :id',
    class: Book::class,
    params: ['id' => $id]
  )
  ->fetch();

view("book", ['book' => $book]);
