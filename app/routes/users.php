<?php

    use App\Libraries\Router;
    use App\Controllers\HomeController;
    use App\Controllers\UserController;

    Router::get('/', [HomeController::class, 'index']);
    
    Router::get('/users', [UserController::class, 'index']);
    Router::get('/users/create', [UserController::class, 'create']);
    Router::post('/users/store', [UserController::class, 'store']);
    Router::get('/users/{id}', [UserController::class, 'show']);
    Router::get('/users/{id}/edit', [UserController::class, 'edit']);
    Router::post('/users/{id}/update', [UserController::class, 'update']);
    Router::post('/users/{id}/destroy', [UserController::class, 'destroy']);
