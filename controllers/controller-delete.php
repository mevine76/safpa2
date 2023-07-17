<?php
require_once "../config.php";
require_once "../helpers/Database.php";
require_once "../models/Animal.php";

// Récupérer l'ID de l'animal à supprimer
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Supprimer l'animal de la base de données
if (Animal::delete($id)) {
    // Redirection vers la page d'accueil avec un message de succès
    header("Location: ../controllers/controller-accueil.php?message=Animal supprimé avec succès");
    exit;
} else {
    // En cas d'échec de la suppression, afficher un message d'erreur
    $message = "Erreur lors de la suppression de l'animal";
}

// Afficher la page de suppression d'un animal




include "../views/delete.php";