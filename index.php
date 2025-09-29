<?php
require 'models/book.model.php';
require 'models/user.model.php';

session_start();

require 'utils.php';
$config = require 'config.php';
require 'database/db.php';

DB::setConfig($config['database']);

require "routes.php";
