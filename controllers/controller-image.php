
<?php
class ImageController
{
    public function uploadImage()
    {
        // Chemin du répertoire "img" dans "assets"
        $imgDirectory = 'assets/img/';

        // Votre code pour gérer l'upload de l'image et enregistrer le chemin dans la base de données

        // Exemple : Enregistrer le nom de l'image et le chemin d'accès dans la base de données
        $imgName = $_FILES['img']['name'];
        $imgPath = $imgDirectory . $imgName;
        // Autres étapes pour enregistrer les données dans la base de données
    }
}
?>
