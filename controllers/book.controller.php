<?php

$book_id = $_REQUEST['id'];

$book =  (new DB())
  ->query(
    query: 'SELECT * FROM books WHERE id = :id',
    class: Book::class,
    params: ['id' => $book_id]
  )
  ->fetch();

$reviews = (new DB())->query(
  query: 'SELECT * FROM reviews WHERE book_id = :id',
  class: Review::class,
  params: ['id' => $book_id]
)->fetchAll();


view("book", compact('book', 'reviews'));
