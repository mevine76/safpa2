<?php

// espece.php
class Specie
{
    /**
     * Méthode pour ajouter une nouvelle espèce à la base de données
     */
    public static function create($name)
    {
        // Récupération d'une instance de PDO
        $dbh = Database::getInstancePDO();

        // Préparation de la requête d'insertion
        $stmt = $dbh->prepare("INSERT INTO specie (name) VALUES (:name)");

        // Liaison des paramètres
        $stmt->bindParam(':name', $name);

        // Exécution de la requête
        return $stmt->execute();
    }


    /**
     * Méthode pour mettre à jour le nom d'une espèce existante dans la base de données
     */
    public static function update($id, $name)
    {
        // Récupération d'une instance de PDO
        $dbh = Database::getInstancePDO();

        // Préparation de la requête de mise à jour
        $stmt = $dbh->prepare("UPDATE specie SET name = :name WHERE id = :id");

        // Liaison des paramètres
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Exécution de la requête
        return $stmt->execute();
    }


    /**
     * Méthode pour supprimer une espèce de la base de données
     */
    public static function delete($id)
    {
        // Récupération d'une instance de PDO
        $dbh = Database::getInstancePDO();

        // Préparation de la requête de suppression
        $stmt = $dbh->prepare("DELETE FROM specie WHERE id = :id");

        // Liaison des paramètres
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Exécution de la requête
        return $stmt->execute();
    }



    /**
     * Méthode pour récupérer la liste des espèces de la base de données
     */
    public static function getAll()
    {
        // Récupération d'une instance de PDO
        $dbh = Database::getInstancePDO();

        // Préparation de la requête de sélection
        $stmt = $dbh->prepare("SELECT * FROM specie");

        // Exécution de la requête
        $stmt->execute();

        // Récupération des résultats
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}