<?php
require "vendor/autoload.php";
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

require "App/database/config.php";