<?php include "templates/head.php" ?>

<a class="h1 text-center py-5 bg-dark text-white text-decoration-none" href="../index.php"></i> AFPA ANIMAL REFUGE </i></a>
<h2 class="text-center my-3">Détails</h2>




<div class="row justify-content-center">
 <?php
foreach (Animal::getAnimalId() as $animal) { ?>
    <div class="card mx-4 col-lg-5">


        <div class="card h-25">
            <h5 class="card-title"><strong> Nom : </strong><?= $animal['name'] ?> </h5>
            <p class="card-text"><strong>ID : </strong><?= $animal['id'] ?> </p>
            <p class="card-text"><strong>Date naissance </strong><?= $animal['date_of_birth'] ?> </p>
            <p class="card-text"><strong>Tatoué : </strong><?= $animal['tatoo'] ?> </p>
            <p class="card-text"><strong>Pucé : </strong><?= $animal['chip'] ?> </p>
            <p class="card-text"><strong>Sexe : </strong><?= $animal['sex'] ?> </p>
            <p class="card-text"><strong>Poids : </strong><?= $animal['weight'] ?> </p>
            <p class="card-text"><strong>Date d'arrivée : </strong><?= $animal['arrival_date'] ?> </p>
            <p class="card-text"><strong>Réservé : </strong><?= $animal['reserved'] ?> </p>
            <p class="card-text"><strong>Date d'adoption : </strong><?= $animal['adoption_date'] ?> </p>
            <p class="card-text"><strong>ID espèce : </strong><?= $animal['id_Specie'] ?> </p>
            <p class="card-text"><strong>ID Couleur : </strong><?= $animal['id_Color'] ?> </p>
            <p class="card-text"><strong>ID Race : </strong><?= $animal['id_Breed'] ?> </p>
            <img class=img-fluid src="<?= $animal['img'] ?>" alt="Card image cap">
            <p class="card-text"><strong>Description : </strong><?= $animal['description'] ?> </p>
        </div>
    </div>
<?php } ?>   
</div>







<?php include "templates/footer.php" ?>