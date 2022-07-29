<?php

    class User extends Connection
    {
        public function create($user)
        {
            $sql = "INSERT INTO users(firstname, lastname, email, age) VALUES (?, ?, ?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$user['firstname'], $user['lastname'], $user['email'], $user['age']]);
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

        public function update($id, $request)
        {
            $sql = "UPDATE users SET firstname = ?, lastname = ?, email = ?, age = ? WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$request['firstname'], $request['lastname'], $request['email'], $request['age'], $id]);
        }

        public function delete($id)
        {
            $sql = "DELETE FROM users WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
        }
    }
