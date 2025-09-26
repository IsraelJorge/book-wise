<?php

$db = new DB();

$id = $_REQUEST['id'];

$book =  $db->getByIdBook($id);

view("book", ['book' => $book]);
