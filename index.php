<?php
session_start();

require 'models/book.model.php';
require 'utils.php';

$config = require 'config.php';
require 'database/db.php';

DB::setConfig($config['database']);

require "routes.php";
