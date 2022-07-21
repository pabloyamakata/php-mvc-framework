<?php

    class Home extends Controller
    {
        public function index($arg = 'John Doe')
        {
            $user = $this->model('user');
            
            $user->name = $arg;
            
            $this->view('home/index', ['name' => $user->name]);
        }
    }
