<?php

if (!auth()) {
  redirect('/');
}

$user_id = auth()->id;

$books = Book::myBooks($user_id);

view("my-books", compact('books'));
