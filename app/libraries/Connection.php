<?php

    namespace App\Libraries;

    use PDO;
    use PDOException;

    class Connection
    {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $password = DB_PASSWORD;
        private $database = DB_NAME;
        private $charset = DB_CHARSET;

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

        public function applyMigrations()
        {
            $this->createMigrationsTable();
            $appliedMigrations = $this->getAppliedMigrations();
            $newMigrations = [];
            $migrationFiles = array_diff(scandir(__DIR__ . '/../migrations/'), ['.', '..']);
            $toApplyMigrations = array_diff($migrationFiles, $appliedMigrations);

            foreach($toApplyMigrations as $migration)
            {
                require_once __DIR__ . '/../migrations/' . $migration;
                $className = pathinfo($migration, PATHINFO_FILENAME);
                $instance = new $className;
                $this->log('Applying migration ' . $migration);
                $instance->up();
                $this->log('Applied migration ' . $migration);
                $newMigrations[] = $migration;
            }

            if(!empty($newMigrations))
            {
                $this->saveMigrations($newMigrations);
            } else
            {
                $this->log('All migrations were applied');
            }
        }

        private function createMigrationsTable()
        {
            $this->connect()->exec('CREATE TABLE IF NOT EXISTS migrations (
                id INT AUTO_INCREMENT PRIMARY KEY,
                migration VARCHAR(255),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;');
        }

        private function getAppliedMigrations()
        {
            $stmt = $this->connect()->prepare('SELECT migration FROM migrations');
            $stmt->execute();
            $appliedMigrations = $stmt->fetchAll(PDO::FETCH_COLUMN);

            return $appliedMigrations;
        }

        private function saveMigrations($newMigrations)
        {
            $newMigrations = implode(',', array_map(fn($migration) => "('$migration')", $newMigrations));
            $stmt = $this->connect()->prepare('INSERT INTO migrations (migration) VALUES ' . $newMigrations);
            $stmt->execute();
        }

        private function log($message)
        {
            echo '[' . date('Y-m-d H:i:s') . '] - ' . $message . PHP_EOL;
        }
    }
