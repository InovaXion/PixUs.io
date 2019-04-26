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
        </div>
        <a style="color: #fed136; font-size: 30px" href="../index.php" class="navbar-brand navbar-collapse">PixUs</a>
        <div class="navbar-collapse collapse dual-nav w-50 order-2">
        </div>
      </div>
    </nav>
  <!-- Navbar -->

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div style="padding-top: 40px" class="row col-12 align-items-center justify-content-center">
        <div class="col-6 form-group">
          <div class="panel panel-default">
            <div class="panel-body">
              <h3 class="thin text-center">Connexion</h3>
              <p class="text-center " >Tu es nouveau? Inscris-toi ? <a href="../index.php">Inscription</a>
              <hr>

              <form action="loginRedirect.php" method="POST">
                <div class="top-margin">
                <label>Pseudo<span class="text-danger">*</span></label>
                <?php 
                if (isset($_GET['error']))
                {
                  echo '<span class="text-danger">Nom de compte inexistant</span>';
                };
                ?>
                  <input required name="pseudo" type="text" class="form-control">
                </div>
                <div class="top-margin">
                  <label>Mot de passe <span class="text-danger">*</span></label>
                  <?php 
                if (isset($_GET['error2']))
                {
                  echo '<span class="text-danger">Mot de passe incorrect</span>';
                };
                ?>
                  <input required name="mdp" type="password" class="form-control">
                </div>
                <hr>

                <div class="row">
                  <div class="col-lg-8">
                  </div>
                  <div class="col-lg-4 text-right">
                    <button class="btn btn-warning" type="submit">Register</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </header>


 <!-- Team -->
 <section class="bg-light" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Notre Team</h2>
          <h3 class="section-subheading text-muted">Les deux personnes à l'origine de ce projet</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="https://pbs.twimg.com/profile_images/950707603981651970/rNQ6TC7J_400x400.jpg" alt="">
            <h4>Mghaoues Mathis</h4>
            <p class="text-muted">Fondateur</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a target="_blank" href="https://twitter.com/M_InovaXion_M">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a target="_blank" href="https://fr-fr.facebook.com/M.InovaXion.M">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a target="_blank" href="https://www.linkedin.com/in/mathis-mghaoues-152332185/">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="../img/profilPictures/1mika.jpeg" alt="">
            <h4>Mickael Wala</h4>
            <p class="text-muted">Fondateur</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a target="_blank" href="https://www.facebook.com/mickael.wala">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a target="_blank" href="https://www.linkedin.com/in/micka%C3%ABl-wala-13081994/">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <p class="large text-muted">Projet qui a été effectuer dans le cadre de la formation Simplon</p>
          <a href="https://simplon.co/roanne/"target="_blank" rel="noopener noreferrer"><img src="https://simplon.co/wp-content/uploads/2019/01/logo-simplon_roanne.png" alt=""></a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php
  include 'footer.php';
  ?>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>

</body>

</html>