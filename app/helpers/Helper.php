<?php

    class Helper
    {
        public static function domain()
        {
            $domain = 'http://localhost/php-mvc-framework/public/';
            return $domain;
        }

        public static function rootDir()
        {
            $rootDir = str_replace('\\', '/', dirname(dirname(__DIR__)) . '/');
            return $rootDir;
        }

        public static function redirect($path)
        {
            header('Location: ' . self::domain() . $path);
        }
    }
