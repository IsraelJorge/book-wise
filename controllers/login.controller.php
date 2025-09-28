<?php

$message = $_REQUEST['message'] ?? '';
$validations = $_SESSION['validations'];

view(
  "login",
  [
    'message' => $message,
    'validations' => $validations
  ]
);
