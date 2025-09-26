<?php

$db = new DB();
$books = $db->getBooks();

view("index", ['books' => $books]);
