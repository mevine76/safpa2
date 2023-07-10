<?php include "templates/head.php" ?>


<a class="h1 text-center py-5 bg-dark text-white text-decoration-none" href="../index.php"></i> AFPA ANIMAL REFUGE </i></a>
<h2 class="text-center my-3"></h2>
<h3 class="text-center my-3">Refuge Afpa des abandonnés</h3>

<?php
foreach(Animal::getAll() as $animal) {


?>


<div class="card" style="width: 18rem;">
  <img src="https://images.pexels.com/photos/1828875/pexels-photo-1828875.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" alt="image animaux">
  <div class="card-body">
    <h5 class="card-title"> <?= $animal['name']?> </h5>
    <p class="card-text"> <?= $animal['description'] ?> </p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

<?php
} ?>






    
<?php include "templates/footer.php" ?>