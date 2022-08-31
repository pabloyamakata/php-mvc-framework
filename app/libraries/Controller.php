<?php

    namespace App\Libraries;

    class Controller
    {
        protected function model($model)
        {
            $selectedModel = '\\App\\Models\\' . ucfirst($model);
            return new $selectedModel;
        }

        protected function view($view, $data = [])
        {
            foreach($data as $key => $value)
            {
                if(is_array($value) && count($value) == 1)
                {
                    ${$key} = $value[0];
                } else
                {
                    ${$key} = $value;
                }
            }

            require_once __DIR__ . '/../views/' . $view . '.php';
        }
    }
