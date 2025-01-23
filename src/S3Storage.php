<?php

namespace App;

use Aws\Exception\AwsException;
use Aws\S3\S3Client;

class S3Storage implements FileStorage
{
    public function __construct(protected S3Client $client, protected string $bucket)
    {
    }

    public function put($path, $content)
    {
// Upload a publicly accessible file. The file size and type are determined by the SDK.
        try {
            $this->client->putObject([
                'Bucket' => $this->bucket,
                'Key' => $path,
                'Body' => $content,
            ]);
        } catch (AwsException $e) {
            echo "There was an error uploading the file: ".$e->getAwsErrorMessage()."\n";
            echo "AWS Error Code: ".$e->getAwsErrorCode()."\n";
            echo "Request ID: ".$e->getRequestId()."\n";
        }
    }
}