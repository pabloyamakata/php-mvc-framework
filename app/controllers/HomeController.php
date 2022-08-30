<?php

    namespace App\Controllers;

    use App\Libraries\Controller;

    class HomeController extends Controller
    {
        public function index()
        {
            $this->view('home/index');
        }
    }
