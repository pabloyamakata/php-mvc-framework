<?php

    // Returns the name of the project main directory or root directory
    $pathArray = explode('/', str_replace('\\', '/', dirname(dirname(__DIR__))));
    $rootDirectory = end($pathArray);

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', $rootDirectory);
