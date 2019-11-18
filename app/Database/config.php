<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => env('DATABASE_DRIVER', 'mysql'),
    'host'      => env('DATABASE_HOST', 'localhost'),
    'database'  => env('DATABASE_NAME', 'user_directory'),
    'username'  => env('DATABASE_USER', 'root'),
    'password'  => env('DATABASE_PASSWORD', ''),
    'charset'   => env('DATABASE_CHARSET', 'utf8'),
    'collation' => env('DATABASE_COLLECTION', 'utf8_unicode_ci'),
    'prefix'    => env('DATABASE_PREFIX'),
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();