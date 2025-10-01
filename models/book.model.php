<?php

class Book
{
  public int $id;
  public string $title;
  public string $description;
  public string $author;

  public static function arrayToObject($items)
  {
    $result = [];

    foreach ($items as $item) {
      $book = new Book();

      $book->id = $item['id'];
      $book->title = $item['title'];
      $book->description = $item['description'];
      $book->author = $item['author'];

      $result[] = $book;
    }
    return $result;
  }
}
