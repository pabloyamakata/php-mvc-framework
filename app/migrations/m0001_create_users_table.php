<?php

    use App\Libraries\Connection;

    class m0001_create_users_table extends Connection
    {
        public function up()
        {
            $sql = 'CREATE TABLE users (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    firstname VARCHAR(255) NOT NULL,
                    lastname VARCHAR(255) NOT NULL,
                    email VARCHAR(255) NOT NULL,
                    age INT NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;';
            
            $this->connect()->exec($sql);
        }

        public function down()
        {
            $sql = 'DROP TABLE users;';
            $this->connect()->exec($sql);
        }
    }
