<?php

    use App\Libraries\Connection;

    class m0002_add_updated_at_to_users extends Connection
    {
        public function up()
        {
            $this->connect()->exec('ALTER TABLE users ADD COLUMN updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;');
        }

        public function down()
        {
            $this->connect()->exec('ALTER TABLE users DROP COLUMN updated_at;');
        }
    }
