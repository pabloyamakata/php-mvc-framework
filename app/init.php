<?php

    require_once 'config/database.php';
    require_once 'config/location.php';
    require_once 'helpers/redirect.php';

    spl_autoload_register(fn($className) => require_once 'libraries/' . $className . '.php');
