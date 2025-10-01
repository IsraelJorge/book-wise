<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  redirect('/');
}

if (!auth()) {
  abort(403);
}

$review = trim($_POST['review']);
$rating = trim($_POST['rating']);
$book_id = $_POST['book_id'];
$user_id = auth()->id;

$validation = Validation::validate([
  'review' => [
    'fieldName' => 'Avaliação',
    'rules' => ['required', 'min:6', 'max:30']
  ],
  'rating' => [
    'fieldName' => 'Nota',
    'rules' => ['required']
  ]
], [
  'review' => $review,
  'rating' => $rating
]);

if ($validation->isInvalid('review')) {
  redirect("/book?id=$book_id");
}


(new DB())->query(
  query: "INSERT INTO reviews (user_id, book_id, review, rating) VALUES (:user_id, :book_id, :review, :rating)",
  params: compact('user_id', 'book_id', 'review', 'rating')
);

flash()->push("message", 'Avaliação feita com sucesso!!!');
redirect("/book?id=$book_id");
