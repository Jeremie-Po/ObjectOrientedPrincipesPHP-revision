<?php
require 'vendor/autoload.php';

use Aws\Exception\AwsException;
use Aws\S3\S3Client;

$s3Key = 'AKIAYXWBOBSCSWQSGJXY';
$s3Secret = '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';

$file = 'text1.txt';
$content = 'hello World';
$bucket = 'testlaracast';

// Instantiate an Amazon S3 client.
$s3 = new S3Client([
    'version' => 'latest',
    'region' => 'us-east-1',
    'credentials' => [
        'key' => $s3Key,
        'secret' => $s3Secret,
    ],
]);

// Upload a publicly accessible file. The file size and type are determined by the SDK.
try {
    $s3->putObject([
        'Bucket' => $bucket,
        'Key' => $file,
        'Body' => $content,
    ]);
} catch (AwsException $e) {
    echo "There was an error uploading the file: ".$e->getAwsErrorMessage()."\n";
    echo "AWS Error Code: ".$e->getAwsErrorCode()."\n";
    echo "Request ID: ".$e->getRequestId()."\n";
}