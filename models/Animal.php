<?php

class Animal
{
    private static $dbh; // La connexion PDO sera stockée ici

    // Méthode pour établir la connexion à la base de données
    private static function connect()
    {
        if (!self::$dbh) {
            try {
                self::$dbh = new PDO('mysql:host=localhost;dbname=refuge', 'root', '');
                self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion à la base de données: " . $e->getMessage());
            }
        }
    }

    
    /**
     * Méthode pour ajouter un nouvel animal à la base de données
     */
    public static function create($data)
    {
        // Vérifier que la date de naissance est présente et non vide
        if (isset($data['date_of_birth']) && !empty($data['date_of_birth'])) {

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
        } else {
            // Afficher un message d'erreur si la date de naissance est manquante ou vide
            echo "La date de naissance est requise.";
            return false; // Ou retournez une autre valeur indiquant qu'il y a eu une erreur
        }
    }

    
    // Méthode pour mettre à jour les détails de l'animal dans la base de données
    public static function update($id, $date_of_birth, $tatoo, $chip, $sex, $name, $weight, $arrival_date, $reserved, $adoption_date, $id_Specie, $id_Color, $id_Breed, $img, $description)
    {
        self::connect();
        $sql = "UPDATE animal SET date_of_birth = :date_of_birth, tatoo = :tatoo, chip = :chip, sex = :sex, name = :name, weight = :weight, arrival_date = :arrival_date, reserved = :reserved, adoption_date = :adoption_date, id_Specie = :id_Specie, id_Color = :id_Color, id_Breed = :id_Breed, img = :img, description = :description WHERE id = :id";
        $stmt = self::$dbh->prepare($sql);

        try {
            $stmt->execute([
                ':id' => $id,
                ':date_of_birth' => $date_of_birth,
                ':tatoo' => $tatoo,
                ':chip' => $chip,
                ':sex' => $sex,
                ':name' => $name,
                ':weight' => $weight,
                ':arrival_date' => $arrival_date,
                ':reserved' => $reserved,
                ':adoption_date' => $adoption_date,
                ':id_Specie' => $id_Specie,
                ':id_Color' => $id_Color,
                ':id_Breed' => $id_Breed,
                ':img' => $img,
                ':description' => $description,
            ]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    /**
     * Méthode pour supprimer un animal de la base de données
     */
    public static function delete($id)
    {
        // Récupération d'une instance de PDO
        $dbh = Database::getInstancePDO();

        // Préparation de la requête de suppression
        $stmt = $dbh->prepare("DELETE FROM animal WHERE id = :id");

        // Liaison des paramètres
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Exécution de la requête
        return $stmt->execute();
    }


    /**
     * Méthode pour récupérer la liste des animaux de la base de données
     */
    public static function getAll()
    {
        // Récupération d'une instance de PDO
        $dbh = Database::getInstancePDO();

        // Préparation de la requête de sélection
        $stmt = $dbh->prepare("SELECT * FROM animal");

        // Exécution de la requête
        $stmt->execute();

        // Récupération des résultats
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Méthode pour récupérer les Id des animaux de la base de données
     */
    public static function getAnimalById()
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
