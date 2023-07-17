<?php
// Je définis les constantes de connexion à la base de données
require_once "../config.php";

// j'appelle le fichier helpers/Database.php
require_once "../helpers/Database.php";

// j'appelle le model animal.php
require_once "../models/Animal.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    // Récupérer les données soumises dans le formulaire
    $data = [
        // ... Récupérez les valeurs soumises par le formulaire ici ...
    ];

    // Ajouter l'animal à la base de données
    if (Animal::create($data)) {
        // Redirection vers la page d'accueil avec un message de succès
        header("Location: accueil.php?message=Animal ajouté avec succès");
        exit;
    } else {
        // En cas d'échec de l'ajout, afficher un message d'erreur
        $message = "Erreur lors de l'ajout de l'animal";
    }
}

// Afficher la page d'ajout d'un animal
include "../views/add.php";


