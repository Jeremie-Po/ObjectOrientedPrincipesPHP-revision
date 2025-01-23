<?php

namespace App;

interface FileStorage
{
    public function put($path, $content);
}