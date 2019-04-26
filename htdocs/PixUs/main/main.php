<?php
session_start();


if (isset($_SESSION['pseudo'])) { } else {
  header('Location: ../login.php');
}

include '../bdd/loginBdd.php';

/* $reponse = $bdd->query("SELECT * FROM images 
                        INNER JOIN users 
                        WHERE imgDate != '' 
                        AND imgTitle != ''
                        AND images.idUser = users.id");


                        UNION ALL
                        SELECT * FROM comments 
                        INNER JOIN images 
                        WHERE comments.idPicture = images.id

 */

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


$reponse4 = $bdd->prepare('SELECT imgLikes FROM images WHERE images.id = ?')


// echo '<pre>' . var_export($selectCommentByUser['userName'], true) . '</pre>';









?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Agency - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="../css/agency.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navbar -->
  <nav class="navbar navbar-dark navbar-expand-md bg-dark justify-content-between">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-nav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse dual-nav w-50 order-1 order-md-0">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="../profil/profil.php">
              <?php
              if (isset($_SESSION['img'])) {
                echo "<img id='imgProfile' src=" . $_SESSION['img'] . ">";
              } else {
                echo $_SESSION['pseudo'];
              } ?>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="deconnexionUser.php">Déconnexion</a>
          </li>
        </ul>
      </div>
      <a style="color: #fed136; font-size: 30px" href="../index.php" class="navbar-brand navbar-collapse">PixUs</a>
      <div class="navbar-collapse collapse dual-nav w-50 order-2">
      </div>
    </div>
  </nav>
  <!-- Navbar -->

  <section class="bg-light sectionUpdate" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Fil d'actualité</h2>
          <h3 class="section-subheading text-muted">Voici les photos des utilisateurs de PixUs !</h3>
        </div>
      </div>
      <div class="row">

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