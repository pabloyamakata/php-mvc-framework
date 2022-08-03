<?php

    class Config
    {
        const DB_HOST = 'localhost';
        const DB_USER = 'root';
        const DB_PASSWORD = '';
        const DB_NAME = 'websavant';
        const DB_CHARSET = 'utf8mb4';

        public static function getDomain()
        {
            $domain = 'http://localhost/php-mvc-framework/public/';
            return $domain;
        }

        public static function getRootDirectory()
        {
            $rootDirectory = str_replace('\\', '/', dirname(dirname(__DIR__)) . '/');
            return $rootDirectory;
        }
    }
