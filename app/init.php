<?php

    require_once 'config/Config.php';
    require_once 'helpers/redirect.php';

    spl_autoload_register(fn($class) => require_once 'libraries/' . $class . '.php');
