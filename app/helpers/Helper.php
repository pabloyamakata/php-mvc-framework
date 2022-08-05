<?php

    class Helper
    {
        public static function redirect($path)
        {
            header('Location: ' . Config::domain() . $path);
        }
    }
