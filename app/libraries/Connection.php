<?php

    class Connection
    {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $password = DB_PASSWORD;
        private $database = DB_NAME;
        private $charset = DB_CHARSET;

        protected function connect()
        {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database . ';charset=' . $this->charset;
            $pdo = new PDO($dsn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        }
    }
