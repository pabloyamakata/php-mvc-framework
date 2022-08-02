<?php

    require_once 'config/database.php';
    require_once 'config/location.php';
    require_once 'helpers/redirect.php';

    spl_autoload_register(fn($class) => require_once 'libraries/' . $class . '.php');
