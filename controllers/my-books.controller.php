<?php

if (!auth()) {
  redirect('/');
}

$user_id = auth()->id;

$books = (new DB())
  ->query(
    query: 'SELECT * FROM books WHERE user_id = :user_id',
    class: Book::class,
    params: compact('user_id')
  )
  ->fetchAll();

view("my-books", compact('books'));
