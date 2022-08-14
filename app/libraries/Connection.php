<?php

    class Connection
    {
        private $host = 'localhost';
        private $user = 'root';
        private $password = '';
        private $database = 'websavant';
        private $charset = 'utf8mb4';

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
