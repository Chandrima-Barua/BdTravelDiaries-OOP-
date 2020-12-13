<?php

// namespace App\config;

class Database
{
    public $connection = null;

    // this function is called everytime this class is instantiated
    public function __construct($dbhost = 'localhost', $dbname = 'bdtravediaries', $username = 'root', $password = '')
    {
        try {
            $this->connection = new PDO("mysql:host={$dbhost};dbname={$dbname};", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    // Insert a row/s in a Database Table
    public function Insert($statement = '')
    {
        try {
            $this->executeStatement($statement);
            return $this->connection->lastInsertId();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    // Select a row/s in a Database Table
    public function Select($statement = '')
    {
        try {
            $stmt = $this->executeStatement($statement);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    // Update a row/s in a Database Table
    public function Update($statement = '', $parameters = [])
    {
        try {
            $this->executeStatement($statement, $parameters);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    // Remove a row/s in a Database Table
    public function Remove($statement = '', $parameters = [])
    {
        try {
            $this->executeStatement($statement, $parameters);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    // execute statement
    private function executeStatement($statement = '')
    {
        try {
            $stmt = $this->connection->prepare($statement);
            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }
}
