<?php

namespace App;

use Aws\S3\S3Client;
use Exception;


class Storage
{
    public function resolve(): FileStorage
    {
//        var_dump($storageMethod);

        $storageMethod = $_ENV['FILE_STORAGE'];

        if ($storageMethod === 'local') {
            return new localStorage();
        } elseif ($storageMethod === 's3') {
            // Instantiate an Amazon S3 client.
            $client = new S3Client([
                'version' => 'latest',
                'region' => 'us-east-1',
                'credentials' => [
                    'key' => $_ENV['S3_KEY'],
                    'secret' => $_ENV['S3_SECRET'],
                ],
            ]);

            return new S3Storage($client, $_ENV['S3_BUCKET']);

        }

        throw new Exception('invalid storage method');

    }
}