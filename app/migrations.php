<?php

    use App\Libraries\Connection;

    require_once 'libraries/Connection.php';
    require_once 'config/config.php';

    $connection = new Connection;
    $connection->applyMigrations();
