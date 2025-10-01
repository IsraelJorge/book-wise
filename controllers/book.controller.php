<?php

$book_id = $_REQUEST['id'];

$book =  Book::get($book_id);

$reviews = (new DB())->query(
  query: 'SELECT * FROM reviews WHERE book_id = :id',
  class: Review::class,
  params: ['id' => $book_id]
)->fetchAll();


view("book", compact('book', 'reviews'));
