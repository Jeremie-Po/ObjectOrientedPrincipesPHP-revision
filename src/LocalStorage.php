<?php

namespace App;

class localStorage implements FileStorage
{
    public function put($path, $content)
    {
        $root = __DIR__.'/../storage';
        $savePath = "{$root}/{$path}";

        mkdir(dirname($savePath), 0777, true);

        file_put_contents($savePath, $content);
    }
}