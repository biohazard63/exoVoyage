<?php

class Database
{
    private const HOST = 'localhost';
    private const DB_NAME = 'exo_voyage';
    private const USERNAME = 'root';
    private const PASSWORD = '';

    public function connect()
    {
        $conn = null;

        try {
            $dsn = 'mysql:host=' . self::HOST . ';dbname=' . self::DB_NAME;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false, // Utilise les préparations de requêtes natives de MySQL
            ];
            $conn = new PDO($dsn, self::USERNAME, self::PASSWORD, $options);
        } catch (PDOException $e) {
            error_log('Connection Error: ' . $e->getMessage()); // Journalise l'erreur au lieu de l'afficher
        }

        return $conn;
    }
}