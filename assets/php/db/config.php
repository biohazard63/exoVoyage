<?php

class Database
{
    private $host = 'localhost';
    private $db_name = 'exo_voyage';
    private $username = 'root';
    private $password = '';

    public function connect()
    {
        $conn = null;

        try {
            $conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $conn;
    }
}

