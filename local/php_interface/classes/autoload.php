<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

spl_autoload_register(function (string $class) {
    if(!str_contains($class, 'Otus')) {
        return;
    }

    $class = str_replace('\\', '/', $class);

    $path = __DIR__ . 'autoload.php/' . $class . '.php';

    if(is_file($path)) {
        require_once $path;
    }
});
