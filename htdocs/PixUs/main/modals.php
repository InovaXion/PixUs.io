<?php

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
          <div class='col-lg-12 mx-auto'>
            <div class='modal-body'>
              <h2>" . $userName['imgTitle'] . "</h2>
              <p class='item-intro text-muted'>" . $userName['imgDescription'] . "</p>";

              $reponse4->execute(array(
                $userName['0']
              ));
              while ($donnees = $reponse4->fetch())
              {
                echo "<div class=''>  <form action='likePictureRedirection.php' method='POST'><input type='image' name='imgLikes' src='../img/like.png'>" .$donnees['imgLikes'].
                "<input type='hidden' name='idPictures' value=\"" . $userName['0'] . "\"></form></div>";
               
              }

              
              echo "
              <img class='img-fluid d-block mx-auto' src=\"" . $userName['imgFilePath'] . "\" alt=''>
              <hr class='test'>
              <h3>Commentaires</h3>
              <div class='comments col-lg-12 mx-auto'>";

              $reponse2->execute(array(
                $userName['0']
              ));
              while ($donnees = $reponse2->fetch())
              {
                echo "<hr><em>".$donnees['commentDate']."</em> &nbsp;&nbsp;&nbsp;"."<strong>" . $donnees['userName'] ."</strong> : ". $donnees['comment'] . "<br>";
               
              }

              
              echo "</div>
              <hr class='test'>
              <ul class='list-inline'>
              <form action=\"commentRedirections.php\" method=\"POST\">
              <input type='hidden' name='idPicture' value=\"" . $userName['0'] . "\">
              <input required type=\"text\" name=\"commentaire\"><br><br>
              <input class=\"btn btn-danger\" type=\"submit\" value=\"Ajouter un commentaire\" />
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