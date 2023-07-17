<?php
// Je définis les constantes de connexion à la base de données
require_once "../config.php";

// j'appelle le fichier helpers/Database.php
require_once "../helpers/Database.php";

// j'appelle le model animal.php
require_once "../models/Animal.php";

// Vérifier si l'identifiant de l'animal à mettre à jour a été transmis via l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {

    $id = $_GET['id'];

   

    // Vérifier si le formulaire a été soumis (méthode POST)
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Récupérer les données soumises dans le formulaire
        $date_of_birth = $_POST['date_of_birth'];
        $tatoo = isset($_POST['tatoo']) ? 1 : 0;
        $chip = isset($_POST['chip']) ? 1 : 0;
        $sex = $_POST['sex'];
        $name = $_POST['name'];
        $weight = $_POST['weight'];
        $arrival_date = $_POST['arrival_date'];
        $reserved = isset($_POST['reserved']) ? 1 : 0;
        $adoption_date = $_POST['adoption_date'];
        $id_Specie = $_POST['id_Specie'];
        $id_Color = $_POST['id_Color'];
        $id_Breed = $_POST['id_Breed'];
        $img = $_POST['img'];
        $description = $_POST['description'];

        // Mettre à jour les détails de l'animal dans la base de données
        if (Animal::update($id, $date_of_birth, $tatoo, $chip, $sex, $name, $weight, $arrival_date, $reserved, $adoption_date, $id_Specie, $id_Color, $id_Breed, $img, $description)) {
            // Redirection vers la page de détails de l'animal mis à jour
            header("Location: ../controllers/controller-details.php?id={$id}");
            exit;
        } else {
            // En cas d'échec de la mise à jour, afficher un message d'erreur
            $message = "Erreur lors de la mise à jour de l'animal";
        }
    }

    // Récupérer les informations actuelles de l'animal depuis la base de données
    $animal = Animal::getAnimalById($id);
    

    // Vérifier si l'animal existe dans la base de données
    if (!$animal) {
        // Rediriger vers la page d'accueil si l'animal n'existe pas
        header("Location: ../controllers/controller-accueil.php");
        exit;
    }

} else {
    // Rediriger vers la page d'accueil si l'identifiant de l'animal n'a pas été transmis
    header("Location: ../controllers/controller-accueil.php");
    exit;
}

//j'appelle le model breed.php
require_once "../models/Breed.php";

//j'appelle le model color.php
require_once "../models/Color.php";

//j'appelle le model species.php
require_once "../models/Specie.php";

// j'inclus la vue update.php
include "../views/update.php";
?>




