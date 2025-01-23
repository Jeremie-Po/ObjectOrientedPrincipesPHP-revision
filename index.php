<?php

use App\Storage;
use Dotenv\Dotenv;

require 'vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

//$storage = new S3Storage($client, $_ENV['S3_BUCKET']);

$storage = new Storage;
$storage->resolve()->put('hello.txt', 'Hello, world!');

echo 'done';