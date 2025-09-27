<?php

$db = new DB();

$books = $db->getBooks($_REQUEST['search']);

view("index", ['books' => $books]);
