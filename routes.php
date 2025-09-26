<?php

$controller = str_replace('/', '',  parse_url($_SERVER['REQUEST_URI'])['path']);

if (!$controller) $controller = 'index';

$isNotFound = !file_exists("controllers/{$controller}.controller.php");

if ($isNotFound) {
  abort(404);
}



require "controllers/{$controller}.controller.php";
