<?php

namespace App\Databases;

use PDO;
use PDOException;

class Connection
{

    protected $connection;

    public function __construct()
    {
        $host = env('DB_HOST');
        $db_name = env('DB_NAME');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$db_name;", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function connect()
    {
        return $this->connection;
    }

    public function query(string $sql, bool $queryAll = true)
    {
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            if ($queryAll) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
}
