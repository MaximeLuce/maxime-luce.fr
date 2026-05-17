<?php

namespace Application\Lib;

class DatabaseConnection
{
    public ?\PDO $database = null;

    public function getConnection(): \PDO
    {
        if ($this->database === null) {
            $host = trim($_ENV['DB_HOST'] ?? 'localhost', " \n\r\t\v\x00\"");
            $dbname = trim($_ENV['DB_NAME'] ?? '', " \n\r\t\v\x00\"");
            $user = trim($_ENV['DB_USER'] ?? 'root', " \n\r\t\v\x00\"");
            $pass = trim($_ENV['DB_PASS'] ?? '', " \n\r\t\v\x00\"");

            // prepare connexion
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

            try {
                $this->database = new \PDO(
                    $dsn,
                    $user,
                    $pass,
                    [
                        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                    ]
                );
            } catch (\PDOException $e) {
                die("Erreur PDO : " . $e->getMessage());
            }
        }

        return $this->database;
    }
}
