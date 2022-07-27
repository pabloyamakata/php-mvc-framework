<?php

    class User extends Controller
    {
        public function __construct()
        {
            $this->user = $this->model('user');
        }

        public function index()
        {
            $users = $this->user->findAll();

            $this->view('users/index', ['users' => $users]);
        }
    }
