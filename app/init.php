<?php

    require_once 'helpers/Helper.php';

    spl_autoload_register(fn($class) => require_once 'libraries/' . $class . '.php');
