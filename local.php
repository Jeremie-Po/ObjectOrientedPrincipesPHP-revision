<?php

$root = 'storage';
$file = 'one/two/three/text.txt';
$content = 'hello World';
$savePath = "{$root}/{$file}";

mkdir(dirname($savePath), 0777, true);

file_put_contents($savePath, $content);