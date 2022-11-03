<?php

    use App\Libraries\Router;
    use App\Controllers\HomeController;

    Router::get('/', [HomeController::class, 'index']);
