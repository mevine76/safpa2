<?php include "templates/head.php"; ?>
<?php

// Vérifier si le formulaire a été soumis (méthode POST)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Vérifier si l'identifiant de l'animal à mettre à jour a été transmis via le formulaire
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        var_dump('id');
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

        // Connexion à la base de données
        $dbh = Database::getInstancePDO();

        // Préparation de la requête de mise à jour
        $sql = "UPDATE animal SET date_of_birth = :date_of_birth, tatoo = :tatoo, chip = :chip, sex = :sex, name = :name, weight = :weight, arrival_date = :arrival_date, reserved = :reserved, adoption_date = :adoption_date, id_Specie = :id_Specie, id_Color = :id_Color, id_Breed = :id_Breed, img = :img, description = :description WHERE id = :id";
        $stmt = $dbh->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':date_of_birth', $date_of_birth);
        $stmt->bindParam(':tatoo', $tatoo, PDO::PARAM_INT);
        $stmt->bindParam(':chip', $chip, PDO::PARAM_INT);
        $stmt->bindParam(':sex', $sex);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':weight', $weight);
        $stmt->bindParam(':arrival_date', $arrival_date);
        $stmt->bindParam(':reserved', $reserved, PDO::PARAM_INT);
        $stmt->bindParam(':adoption_date', $adoption_date);
        $stmt->bindParam(':id_Specie', $id_Specie, PDO::PARAM_INT);
        $stmt->bindParam(':id_Color', $id_Specie, PDO::PARAM_INT);
        $stmt->bindParam(':id_Breed', $id_Specie, PDO::PARAM_INT);
        $stmt->bindParam(':img', $id_Specie, PDO::PARAM_INT);
        $stmt->bindParam(':description', $id_Specie, PDO::PARAM_INT);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Exécution de la requête
        if ($stmt->execute()) {
            // Redirection vers la page de détails de l'animal mis à jour
            header("Location: ../controllers/controller-details.php?id={$id}");
            var_dump('ok');
            exit;
        } else {
            // En cas d'échec de la mise à jour, afficher un message d'erreur
            $message = "Erreur lors de la mise à jour de l'animal";
        }
    }
}

// Vérifier si l'identifiant de l'animal à mettre à jour a été transmis via le formulaire
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];

    // Requête pour récupérer les informations de l'animal à partir de la base de données

    $sql = "SELECT * FROM animal WHERE id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    // Vérifier si l'animal existe dans la base de données
    if ($stmt->rowCount() === 1) {
        $animal = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        // Rediriger vers la page d'accueil si l'animal n'existe pas
        header("Location: ../controllers/controller-accueil.php");
        exit;
    }
} else {
    // Rediriger vers la page d'accueil si l'identifiant de l'animal n'a pas été transmis
    // header("Location: ../controllers/controller-accueil.php");
    // exit;
}
?>



<!-- Formulaire de mise à jour d'un animal -->
<div class="container">
    <h2 class="text-center my-3">Mettre à jour un pensionnaire</h2>
    <form method="post" class="form-inline">
        <!-- Champs pour les détails de l'animal à mettre à jour -->
        <!-- Utilisez les valeurs par défaut des détails actuels de l'animal pour chaque champ -->
        <input type="hidden" name="id" value="<?php echo $animal[0]['id']; ?>">

        <div class="form-group">
            <label for="date_of_birth" class="mb-2">Date de naissance:</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="<?php echo $animal[0]['date_of_birth']; ?>" required>
        </div>
        <br>
        <div class="form-check">
            <input type="checkbox" name="tatoo" id="tatoo" value="1" class="form-check-input" <?php echo $animal[0]['tatoo'] ? 'checked' : ''; ?>>
            <label for="tatoo" class="form-check-label">Tatoué</label>
        </div>
        <div class="form-check">
            <input type="checkbox" name="chip" id="chip" value="1" class="form-check-input" <?php echo $animal[0]['chip'] ? 'checked' : ''; ?>>
            <label for="chip" class="form-check-label">Pucé</label>
        </div>
        <br>
        <div class="form-group">
            <label for="sex" class="mb-2">Sexe:</label>
            <select name="sex" id="sex" class="form-control">
                <option value="male" <?php echo ($animal[0]['sex'] === 'male') ? 'selected' : ''; ?>>Mâle</option>
                <option value="female" <?php echo ($animal[0]['sex'] === 'female') ? 'selected' : ''; ?>>Femelle</option>
            </select>
            <br>
        </div>
        <div class="form-group">
            <label for="name" class="mb-2">Nom:</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo $animal[0]['name']; ?>" required>
        </div>
        <br>
        <div class="form-group">
            <label for="weight" class="mb-2">Poids:</label>
            <input type="text" name="weight" id="weight" class="form-control" value="<?php echo $animal[0]['weight']; ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="arrival_date" class="mb-2">Date d'arrivée:</label>
            <input type="date" name="arrival_date" id="arrival_date" class="form-control" value="<?php echo $animal[0]['arrival_date']; ?>">
        </div>
        <br>
        <div class="form-check">
            <input type="checkbox" name="reserved" id="reserved" value="1" class="form-check-input" <?php echo $animal[0]['reserved'] ? 'checked' : ''; ?>>
            <label for="reserved" class="form-check-label">Réservé</label>
        </div>
        <br>
        <div class="form-group">
            <label for="adoption_date" class="mb-2">Date d'adoption:</label>
            <input type="date" name="adoption_date" id="adoption_date" class="form-control" value="<?php echo $animal[0]['adoption_date']; ?>">
        </div>
        <br>

        <br>
        <div class="form-group">
            <label for="id_Specie" class="mb-2">Espèce:</label>
            <select name="id_Specie" id="id_Specie" class="form-control">
                <?php
                // Récupération des espèces de la base de données
                $stmt = Database::getInstancePDO()->prepare("SELECT id, name FROM specie");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $selected = ($row['id'] === $animal[0]['id_Specie']) ? 'selected' : '';
                    echo "<option value=\"" . $row['id'] . "\" $selected>" . $row['name'] . "</option>";
                }
                ?>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="id_Color" class="mb-2">Couleur:</label>
            <select name="id_Color" id="id_Color" class="form-control">
                <?php
                // Récupération des couleurs de la base de données
                $stmt = Database::getInstancePDO()->prepare("SELECT id, name FROM color");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value=\"" . $row['id'] . "\">" . $row['name'] . "</option>";
                }
                ?>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="id_Breed" class="mb-2">Race:</label>
            <select name="id_Breed" id="id_Breed" class="form-control">
                <?php
                // Récupération des couleurs de la base de données
                $stmt = Database::getInstancePDO()->prepare("SELECT id, name FROM breed");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value=\"" . $row['id'] . "\">" . $row['name'] . "</option>";
                }
                ?>
            </select>
    </form>
    
</div>

<div class="row flex-column align-items-center mx-0 py-2">
    <a class="btn btn-dark col-lg-2 col-8 my-2" href="../controllers/controller-accueil.php">Accueil</a>
    <a class="btn btn-dark col-lg-2 col-8 my-2" href="../controllers/controller-update.php">Modifier un pensionnaire</a>
</div>

<?php include "templates/footer.php" ?>