<?php include "templates/head.php"; ?>

<div class="container">
    <h2 class="text-center my-3">Supprimer un pensionnaire</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?= $animal['id'] ?>">
        <p>Voulez-vous vraiment supprimer l'animal <?= $animal['name'] ?> ?</p>
        <div class="d-flex justify-content-center">
            <input type="submit" name="submit" value="Supprimer" class="btn btn-danger btn-lg">
            <a href="controller-accueil.php" class="link-primary mt-2 ms-3 me-3">Annuler</a>
        </div>
    </form>
</div>

<?php include "templates/footer.php"; ?>
