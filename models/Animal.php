<?php

class Animal
{
    /**
     * Méthode pour ajouter un nouvel animal à la base de données
     */
    public static function create($data)
    {
        // Récupération d'une instance de PDO
        $dbh = Database::getInstancePDO();

        // Préparation de la requête d'insertion
        $stmt = $dbh->prepare("INSERT INTO animal (date_of_birth, tatoo, chip, sex, name, weight, arrival_date, reserved, adoption_date, id_Specie, id_Color, id_Breed, img, description) VALUES (:date_of_birth, :tatoo, :chip, :sex, :name, :weight, :arrival_date, :reserved, :adoption_date, :id_Specie, :id_Color, :id_Breed, :img, :description)");

        // Liaison des paramètres
        $stmt->bindParam(':date_of_birth', $data['date_of_birth']);
        $stmt->bindParam(':tatoo', $data['tatoo'], PDO::PARAM_INT);
        $stmt->bindParam(':chip', $data['chip'], PDO::PARAM_INT);
        $stmt->bindParam(':sex', $data['sex']);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':weight', $data['weight']);
        $stmt->bindParam(':arrival_date', $data['arrival_date']);
        $stmt->bindParam(':reserved', $data['reserved'], PDO::PARAM_INT);
        $stmt->bindParam(':adoption_date', $data['adoption_date']);
        $stmt->bindParam(':id_Specie', $data['id_Specie'], PDO::PARAM_INT);
        $stmt->bindParam(':id_Color', $data['id_Color'], PDO::PARAM_INT);
        $stmt->bindParam(':id_Breed', $data['id_Breed'], PDO::PARAM_INT);
        $stmt->bindParam(':img', $data['img'], PDO::PARAM_INT);
        $stmt->bindParam(':description', $data['description'], PDO::PARAM_INT);

        // Exécution de la requête
        return $stmt->execute();
    }




    /**
     * Méthode pour récupérer la liste des animaux de la base de données
     */
    public static function getAll()
    {
    }


    public static function getAnimalId() 
    {
     
        // Récupération d'une instance de PDO
        $dbh = Database::getInstancePDO();
        $id = $_GET['id']; 
        // Préparation de la requête de sélection
        $stmt = $dbh->prepare("SELECT * FROM animal WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
           

        // Exécution de la requête
        $stmt->execute();

        // Récupération des résultats
        return $stmt->fetchAll(PDO::FETCH_ASSOC);   
    }
}
