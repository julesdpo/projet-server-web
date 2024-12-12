<?php

class CoreModel
{
    
    protected $db;

    public function __construct()
    {
        // Connexion à la base de données
        $this->db = $this->getDatabaseConnection();
    }

    // Méthode pour établir la connexion à la base de données
    private function getDatabaseConnection()
    {
        try {
            $dsn = 'mysql:host=127.0.0.1;dbname=ecom;charset=utf8';
            $username = 'julesdupont';
            $password = 'velo';

            return new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
    }

    // Méthode exécuter une requête SQL
    protected function query($sql, $params = [])
    {
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            die('Erreur dans la requête : ' . $e->getMessage());
        }
    }

    // Méthode pour récupérer tous les résultats d'une table
    public function findAll($table)
    {
        $sql = "SELECT * FROM $table";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    // Méthode pour récupérer un élément par son ID
    public function findById($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id = :id";
        $stmt = $this->query($sql, ['id' => $id]);
        return $stmt->fetch();
    }

    
    

}

    