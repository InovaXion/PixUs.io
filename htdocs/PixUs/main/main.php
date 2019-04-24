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

$userPicture = $reponse->fetchAll(); */

$reponse = $bdd->query("SELECT * FROM images WHERE imgDate != '' AND imgTitle != ''");

$userPicture = $reponse->fetchAll();

// faux car ne pas faire select ALL aller sur https://openclassrooms.com/fr/courses/1959476-administrez-vos-bases-de-donnees-avec-mysql/1965156-union-de-plusieurs-requetes
$reponse = $bdd->query("SELECT * FROM images 
                        INNER JOIN users 
                        WHERE imgDate != '' 
                        AND imgTitle != '' 
                        AND images.idUser = users.id
                        UNION ALL
                        SELECT * FROM comments 
                        INNER JOIN images 
                        WHERE comments.idPicture = images.id");

$userNames = $reponse->fetchAll();


// foreach ($userNames as $userName) {
// echo $userName['idPicture'];
// echo "<br>";
// } 

$reponse = $bdd->query("SELECT * FROM comments INNER JOIN images WHERE comments.idPicture = images.id");

$tests = $reponse->fetchAll();

echo '<pre>' . var_export($userNames, true) . '</pre>';
echo "<br>";
foreach ($tests as $test){
  echo $test['comment'];
  echo "<br>";
}

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
      <a style="color: #fed136; font-size: 30px" href="../index.php" class="navbar-brand navbar-collapse">PixUs.io</a>
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
          echo "
          <div class='col-md-4 col-sm-6 portfolio-item'>
          <a class='portfolio-link' data-toggle='modal' href='#portfolioModal" . $picture['id'] . "'>
            <div class='portfolio-hover'>
              <div class='portfolio-hover-content'>
                <i class='fas fa-plus fa-3x'></i>
              </div>
            </div>
            <img class='img-fluid' src=\"" . $picture['imgFilePath'] . "\"alt=''>
          </a>
        </div>";
        }

        ?>
      </div>
    </div>
  </section>

  <?php

// Boucle d'affichage des modals 

foreach($userNames as $userName){
    if ($userName['0'] == $userName['idPicture']){
      $comment=$userName['comment'];
    };
    
  echo "<div class='portfolio-modal modal fade' id='portfolioModal" . $userName['0'] . "' tabindex='-1' role='dialog' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='close-modal' data-dismiss='modal'>
        <div class='lr'>
          <div class='rl'></div>
        </div>
      </div>
      <div class='container'>
        <div class='row'>
          <div class='col-lg-8 mx-auto'>
            <div class='modal-body'>
              <!-- Project Details Go Here -->
              <h2>" . $userName['imgTitle'] . "</h2>
              ". $comment ."
              <p class='item-intro text-muted'>" . $userName['imgDescription'] . "</p>
              <img class='img-fluid d-block mx-auto' src=\"" . $userName['imgFilePath'] . "\" alt=''><hr>
              <ul class='list-inline'>
              <form action=\"commentRedirections.php\" method=\"POST\">
              <input type='hidden' name='idPicture' value=\"" . $userName['0'] . "\">
              <input required type=\"text\" name=\"commentaire\"><br><br>
              <input class=\"btn btn-danger\" type=\"submit\" value=\"Ajouter commentaire\" />
              </form>
              <li>Posté par : <a href=\"test.php\">" . $userName['userName'] . "</a></li>
                <li>le : " . $userName['imgDate'] . "</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>";
};

  ?>

  


  <!-- Footer -->
  <footer class="bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; Your Website 2019</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="list-inline quicklinks">
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

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

</body>

</html>