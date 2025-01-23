<?php

require 'vendor/autoload.php';

use App\localStorage;

$storage = new localStorage();
$storage->put('file.txt', 'Hello, world!');

echo 'done';