<?php

    class User extends Connection
    {
        public function create($firstName, $lastName, $email)
        {
            $sql = "INSERT INTO users(first_name, last_name, email) VALUES (?, ?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$firstName, $lastName, $email]);
        }

        public function find($id)
        {
            $sql = "SELECT * FROM users WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetchAll();
            return $result;
        }

        public function findAll()
        {
            $sql = "SELECT * FROM users";
            $result = $this->connect()->query($sql);
            return $result;
        }
    }
