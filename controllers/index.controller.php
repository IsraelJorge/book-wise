<?php

$books = (new DB())->getBooks($_REQUEST['search']);

view("index", ['books' => $books]);
