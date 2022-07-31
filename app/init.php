<?php

    require_once 'config/database.php';
    require_once 'config/paths.php';

    spl_autoload_register(fn($className) => require_once 'libraries/' . $className . '.php');
