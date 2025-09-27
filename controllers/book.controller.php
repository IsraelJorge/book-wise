<?php

$id = $_REQUEST['id'];

$book =  (new DB())->getByIdBook($id);

view("book", ['book' => $book]);
