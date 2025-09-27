<?php

$queryParams = $_REQUEST['search'];

$books = (new DB())
  ->query(
    query: 'SELECT * FROM books WHERE title LIKE :search',
    class: Book::class,
    params: ['search' => "%$queryParams%"]
  )
  ->fetchAll();

view("index", ['books' => $books]);
