<?php

$queryParams = $_REQUEST['search'] ?? '';

$books = Book::all($queryParams);

view("index", ['books' => $books]);
