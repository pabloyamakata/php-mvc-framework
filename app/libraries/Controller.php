<?php

    class Controller
    {
        protected function model($model)
        {
            require_once("../app/models/$model.php");
            return new $model;
        }

        protected function view($view, $vars = [])
        {
            foreach ($vars as $key => $value) {
                ${$key} = $value;
            }

            require_once("../app/views/$view.php");
        }
    }
