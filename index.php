<?php
require 'models/book.model.php';
require 'models/user.model.php';

session_start();

$config = require 'config.php';
require 'database/db.php';

DB::setConfig($config['database']);

require 'utils/Flash.php';
require 'utils/Validation.php';
require 'utils/index.php';

require "routes.php";
