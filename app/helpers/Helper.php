<?php

    namespace App\Helpers;

    session_start();

    class Helper
    {
        public static function redirect($path)
        {
            header('Location: ' . APP_URL . $path);

            return new self;
        }

        public function with($title, $content)
        {
            $_SESSION[$title] = $content;
        }

        public function withErrors($errors)
        {
            $_SESSION['errors'] = $errors;
        }
    }
