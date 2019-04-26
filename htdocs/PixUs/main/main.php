<?php
session_start();


if (isset($_SESSION['pseudo'])) {} 
  else {
  header('Location: ../login.php');
}

include '../bdd/loginBdd.php';

$reponse = $bdd->query("SELECT * FROM images WHERE imgDate != '' AND imgTitle != '' ORDER BY imgDate DESC");

$userPicture = $reponse->fetchAll();

// Sélectionne toutes les photos qui on été posté pour le fil d'actualité
$reponse = $bdd->query("SELECT * FROM images 
                        INNER JOIN users 
                        WHERE imgDate != '' 
                        AND imgTitle != '' 
                        AND images.idUser = users.id
                       ");

$userNames = $reponse->fetchAll();

//On prépare les commentaires, le nom de l'user et la date du commentaire
$reponse2 = $bdd->prepare('SELECT comment, userName, commentDate  FROM comments  WHERE idPicture = ?');

// On prépare le nombre de likes par ID d'images
$reponse4 = $bdd->prepare('SELECT imgLikes FROM images WHERE images.id = ?')

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Agency - Start Bootstrap Theme</title>

  <?php
  include 'links.php'; 
  ?>
</head>

<body id="page-top">

  <!-- Navbar -->
<?php
  include 'navbar.php';
?>


  <section class="bg-light sectionUpdate" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Fil d'actualité</h2>
          <h3 class="section-subheading text-muted">Voici les dernières photos des utilisateurs de PixUs !</h3>
        </div>
      </div>
      <div class="row2">

        <?php
        // Boucle d'affichage des photos
        foreach ($userPicture as $picture) {
          include 'photos.php';
        };
        ?>

      </div>
    </div>
  </section>

  <?php
  // Boucle d'affichage des modals 
  foreach ($userNames as $userName) {
    include 'modals.php';
  };
  ?>




  <!-- Footer -->
  <?php
  include 'footer.php';
  ?>

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="../js/jqBootstrapValidation.js"></script>
  <script src="../js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../js/agency.min.js"></script>

  <script src="../js.testJS.js"></script>

</body>

</html>