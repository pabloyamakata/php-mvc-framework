<?php

    class Connection extends Config
    {
        private $host = Config::DB_HOST;
        private $user = Config::DB_USER;
        private $password = Config::DB_PASSWORD;
        private $database = Config::DB_NAME;
        private $charset = Config::DB_CHARSET;

        protected function connect()
        {
            try
            {
                $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database . ';charset=' . $this->charset;
                $pdo = new PDO($dsn, $this->user, $this->password);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            } catch(PDOException $e)
            {
                echo 'Connection failed: ' . $e->getMessage();
            }
        }
    }
