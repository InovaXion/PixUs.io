<nav class="navbar navbar-dark navbar-expand-md bg-dark justify-content-between">
    <div class="container-fluid">
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-nav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse dual-nav w-50 order-1 order-md-0">
            <a class="nav-link" href="../profil/profil.php">
              <?php
              if (isset($_SESSION['img'])) {
                echo "<img id='imgProfile' src=" . $_SESSION['img'] . ">";
              } else {
                echo $_SESSION['pseudo'];
              } ?>
            </a>
                
            <a class="nav-link float-right" href="deconnexionUser.php">Déconnexion</a>
         
      </div>
      <a style="color: #fed136; font-size: 30px" href="../index.php" class="navbar-brand navbar-collapse">PixUs</a>
      <div class="navbar-collapse collapse dual-nav w-50 order-2">
      </div>
    </div>
  </nav>