<?php

    class Controller
    {
        protected function model($model)
        {
            require_once __DIR__ . '/../models/' . $model . '.php';
            return new $model;
        }

        protected function view($view, $vars = [])
        {
            foreach ($vars as $key => $value) {
                ${$key} = $value;
            }

            require_once __DIR__ . '/../views/' . $view . '.php';
        }
    }
