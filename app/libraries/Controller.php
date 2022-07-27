<?php

    class Controller
    {
        protected function model($model)
        {
            $capitalizedModel = ucfirst($model);
            require_once __DIR__ . '/../models/' . $capitalizedModel . '.php';
            return new $capitalizedModel;
        }

        protected function view($view, $vars = [])
        {
            foreach ($vars as $key => $value) {
                ${$key} = $value;
            }

            require_once __DIR__ . '/../views/' . $view . '.php';
        }
    }
