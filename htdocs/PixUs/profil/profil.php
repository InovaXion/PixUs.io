<?php
session_start();


if (isset($_SESSION['pseudo'])) { } else {
  header('Location: ../login/login.php');
}

include '../bdd/loginBdd.php';



//On récupère toutes les infos de l'user qui est connecté sur sa session
$pseudoID = $_SESSION['id'];

$req = $bdd->prepare("SELECT * FROM users WHERE id = ?");

$req->execute(array(
  $pseudoID
));
$infosProfil = $req->fetch();

//On récupère toutes les infos de la photo de profil de l'user
$reponse = $bdd->query("SELECT * FROM images 
                        INNER JOIN users 
                        WHERE images.id = users.IdProfilPicture");

$profilPicture = $reponse->fetch();


//On récupère toutes les photo uploader par l'user
$reponse = $bdd->query("SELECT * FROM images WHERE idUser = $pseudoID AND imgTitle !='' ");

$userPicture = $reponse->fetchAll();

$reponse2 = $bdd->prepare('SELECT comment, userName, commentDate  FROM comments  WHERE idPicture = ?');




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
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
  <!-- Custom styles for this template -->
  <link href="../css/agency.min.css" rel="stylesheet">

</head>

<body id="page-top">


  <!-- Navbar -->
  <?php
  include 'navbar.php';
?>

  <section class="sectionProfil">
    <div class="container">
      <div class="row">
        <div class="col-md-4 text-center"> <?php
                                            if (isset($_SESSION['img'])) {
                                              echo "<img class='profilPicture' src=" . $_SESSION['img'] . ">";
                                            }
                                            ?>
       
          <form enctype="multipart/form-data" action="profilPictureRedirection.php" method="post">
          <?php if (isset($_GET['error']))
                {
                  echo '<span class="text-danger">L\'image n\'est pas au bon format, veuillez mettre une image au format jpeg ou png </span>';
                };
                ?>

            <h3 class="thin text-center">Changer de photo de profil</h3>
            <input name="profilPicture" type="file" /><br>
            <button class="btn btn-warning" type="submit">Upload</button>
          </form>

        </div>
        <div class="col-md-6 offset-2 align-left">
          <?php echo "<h3> Nom d'utilisateur : </h3> " . $infosProfil['userName']?>
          <?php echo "<br>"?>
          <?php echo "<br>"?>
          <?php echo "<h3> Adresse E-Mail :</h3> " . $infosProfil['email']  ?>
          <?php echo "<br>"?>
          <?php echo "<br>"?>
          <?php echo "<h3> Bio : </h3><p>" . $infosProfil['bio'] . "</p>" ?>
          <form action="profilBioRedirect.php" method="POST">
            <input type="text" name="bio">
            <button class="btn btn-warning" type="submit">Valider</button>
          </form>
          <p>Modifie ta bio </p>
        </div>
      </div>
    </div>
    </div>
  </section>

  <!-- Portfolio Grid -->
  <section class="bg-light sectionUpdate" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="container">
            <div class="row col-12 align-items-center justify-content-center">
              <div class="col-sm-6 form-group">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <h3 class="thin text-center">Upload Photo</h3>
                    <?php if (isset($_GET['errorFileType']))
                {
                  echo '<span class="text-danger">L\'image n\'est pas au bon format, veuillez mettre une image au format jpeg ou png </span>';
                };?>
                    <hr>
                    <form enctype="multipart/form-data" action="userPictureRedirection.php" method="POST">
                      <div class="top-margin">
                        <label>Donner un titre à votre photo <span class="text-danger">*</span></label>
                        <input name="titlePicture" type="text" required class="form-control" />
                      </div>
                      <div class="top-margin">
                        <label>Ajouter une description à votre photo <span class="text-danger">*</span></label>
                        <input name="descriptionPicture" type="text" required class="form-control" />
                      </div>
                      <div class="row top-margin">
                        <div class="col-sm-6"><br>
                          <input required name="userPicture" type="file" />
                        </div>
                      </div>

                      <hr>

                      <div class="row">
                        <div class="col-lg-8">
                        </div>
                        <div class="col-lg-4 text-right">
                          <button class="btn btn-warning" type="submit">Upload</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <h2 class="section-heading text-uppercase">Mes photos</h2>
        </div>
      </div>
      <div class="row2">


        <?php

        //boucle d'affichage des photos
        foreach ($userPicture as $picture) {
          echo "
          <div class='portfolio-item item'>
          <a class='portfolio-link' data-toggle='modal' href='#portfolioModal" . $picture['id'] . "'>
            <div class='portfolio-hover'>
              <div class='portfolio-hover-content'>
                <i class='fas fa-plus fa-3x'></i>
              </div>
            </div>
            <img class='img-fluid' src=\"" . $picture['imgFilePath'] . "\"alt=''>
          </a>
          <div class='portfolio-caption'>
            <h4>" . $picture['imgTitle'] . "</h4>
            <p class='text-muted'>" . $picture['imgDescription'] . "</p>
          </div>
        </div>";
        }

        ?>

      </div>
    </div>
  </section>

  <?php

  // Boucle d'affichage des modals

  foreach ($userPicture as $picture) {
    echo "<div class='portfolio-modal modal fade' id='portfolioModal" . $picture['id'] . "' tabindex='-1' role='dialog' aria-hidden='true'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='close-modal' data-dismiss='modal'>
          <div class='lr'>
            <div class='rl'></div>
          </div>
        </div>
        <div class='container'>
          <div class='row'>
            <div class='col-lg-12 mx-auto'>
              <div class='modal-body'>
                <h2>" . $picture['imgTitle'] . "</h2>
                <p class='item-intro text-muted'>" . $picture['imgDescription'] . "</p>
                <img class='img-fluid d-block mx-auto' src=\"" . $picture['imgFilePath'] . "\" alt=''>
                <hr class='test'>
              <h3>Commentaires</h3>
              <div class='comments col-lg-12 mx-auto'>";

              $reponse2->execute(array(
                $picture['id']
              ));
              while ($donnees = $reponse2->fetch())
              {
                echo "<em>".$donnees['commentDate']."</em> &nbsp;&nbsp;&nbsp;"."<strong>" . $donnees['userName'] ."</strong> : ". $donnees['comment'] . "<br>";
               
              }

              
              echo "</div>
              <hr class='test'>
                <ul class='list-inline'>
                <form action=\"commentRedirections2.php\" method=\"POST\">
              <input type='hidden' name='idPicture' value=\"" . $picture['id'] . "\">
              <input required type=\"text\" name=\"commentaire\"><br><br>
              <input class=\"btn btn-warning\" type=\"submit\" value=\"Ajouter un commentaire\" />
              </form>
                  <li>Date: " . $picture['imgDate'] . "</li>
                </ul>
                
                <form action=\"deletePicture.php\" method=\"POST\">
                <input type='hidden' name='idPhoto' value=\"" . $picture['id'] . "\">
                <input class=\"btn btn-warning\" type=\"submit\" value=\"Supprimer photo\" />
              </form>
                
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

</body>

</html>