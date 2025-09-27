<?php

class DB
{
  private static $db = null;

  public static function connect(): PDO
  {
    if (self::$db === null) {
      self::$db = new PDO('sqlite:database/db.sqlite');
      self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return self::$db;
  }

  /** @return Book[] */
  public function getBooks($search = '')
  {

    $query = self::connect()->prepare(
      'SELECT * FROM books 
      WHERE 
        title LIKE :search 
      OR 
        author LIKE :search 
      OR 
        description LIKE :search'
    );

    $query->setFetchMode(PDO::FETCH_CLASS, Book::class);

    $query->execute([':search' => '%' . $search . '%']);

    $items = $query->fetchAll();

    return $items;
  }


  public function getByIdBook($id): Book
  {
    $db = self::connect();

    $query = $db->prepare('SELECT * FROM books WHERE books.id = :id');

    $query->setFetchMode(PDO::FETCH_CLASS, Book::class);

    $query->execute([':id' => $id]);

    $item = $query->fetch();

    return $item;
  }
}
