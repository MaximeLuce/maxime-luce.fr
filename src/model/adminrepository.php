<?php

namespace Application\Model;

use Application\Lib\DatabaseConnection;

class AdminRepository
{
    public DatabaseConnection $connection;

    public function getAdmin(string $pseudo): ?array
    {
        // get PDO instance from DatabaseConnection
        $pdo = $this->connection->getConnection();

        // request preparation
        $statement = $pdo->prepare("SELECT id, psw FROM admins WHERE name = :pseudo");
        
        // request execution
        $statement->execute(['pseudo' => $pseudo]);

        // get result
        $row = $statement->fetch();

        if ($row === false) {
            return null; // admin doesn't exist
        }

        return $row; // return table with 'id' and 'psw'
    }
}