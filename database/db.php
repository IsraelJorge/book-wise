<?php

class DB
{
  private static $db = null;

  public static function connect()
  {
    if (self::$db === null) {
      self::$db = new PDO('sqlite:database/db.sqlite');
      self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return self::$db;
  }

  public function getBooks()
  {

    $query = self::connect()->query('SELECT * FROM books');

    $items = $query->fetchAll(PDO::FETCH_ASSOC);

    $books = Book::arrayToObject($items);

    return $books;
  }


  public function getByIdBook($id)
  {
    $db = self::connect();

    $query = $db->prepare('SELECT * FROM books WHERE books.id = :id');
    $query->execute([':id' => $id]);

    $item = $query->fetchAll(PDO::FETCH_ASSOC);

    if (!$item) {
      return null;
    }

    $book = Book::arrayToObject($item)[0];

    return $book;
  }
}
