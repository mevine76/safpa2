<!-- upload_image_view.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Upload d'image</title>
</head>
<body>
    <!-- Votre formulaire d'upload d'image -->
    <form action="upload" method="post" enctype="multipart/form-data">
        <input type="file" name="img">
        <input type="submit" value="Envoyer">
    </form>

    <!-- Affichage de l'image -->
    <?php
    // Remplacez "nom_de_l_image.jpg" par le nom de l'image que vous avez enregistrée en base de données
    $imgNameFromDB = "snow.jpg";
    $imgURL = $imgDirectory . $imgNameFromDB;
    ?>
    <img src="<?php echo $imgURL; ?>" alt="Nom de l'image">
</body>
</html>
