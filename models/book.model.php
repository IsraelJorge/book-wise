<?php

class Book
{
  public int $id;
  public string $title;
  public string $description;
  public string $author;
  public int $average_rating;
  public int $total_rating;


  public function query($where, $params)
  {
    return (new DB())->query(
      query: "SELECT
	              b.id,
	              b.title,
	              b.author,
	              b.description,
	              COALESCE(round(sum(r.rating) / 5.0), 0) as average_rating,
	              COALESCE(count(r.id), 0) as total_rating
              FROM
	              books b
              LEFT JOIN reviews r ON
	              r.book_id = b.id
              WHERE
	              $where
              GROUP BY
	              b.id,
	              b.title ,
	              b.author ,
	              b.description",
      class: Book::class,
      params: $params
    );
  }

  public static function get($id)
  {
    $book = (new self())->query(
      where: 'b.id = :id',
      params: compact('id')
    )->fetch();

    return $book;
  }

  public static function myBooks($user_id)
  {
    $books = (new self())->query(
      where: 'b.user_id = :user_id',
      params: compact('user_id')
    )->fetchAll();

    return $books;
  }

  public static function all($search)
  {
    $books = (new self())->query(
      where: 'b.title LIKE :search',
      params: ['search' => "%$search%"]
    )->fetchAll();

    return $books;
  }
}
