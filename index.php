<?php

use App\S3Storage;
use Aws\S3\S3Client;
use Dotenv\Dotenv;

require 'vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$s3Key = $_ENV['S3_KEY'];
$s3Secret = $_ENV['S3_SECRET'];

// Instantiate an Amazon S3 client.
$client = new S3Client([
    'version' => 'latest',
    'region' => 'us-east-1',
    'credentials' => [
        'key' => $s3Key,
        'secret' => $s3Secret,
    ],
]);


$storage = new S3Storage($client, $_ENV['S3_BUCKET']);
$storage->put('file.txt', 'Hello, world!');

echo 'done';