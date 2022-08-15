<?php

    class Helper
    {
        public static function redirect($path)
        {
            header('Location: ' . APP_URL . $path);
        }
    }
