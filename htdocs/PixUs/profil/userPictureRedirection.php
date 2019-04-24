<?php
session_start();


include '../bdd/loginBdd.php';
 
$idUser=$_SESSION['id'];

// Récupérer les données du formulaire
$imgTitle = $_POST['titlePicture'];
$imgDescription = $_POST['descriptionPicture'];
$idUser=$_SESSION['id'];


//on prépare une requete qui enregistre le chemin de l'image dans la bdd
$req=$bdd->prepare('INSERT INTO images (idUser, imgFilePath, imgTitle, imgDescription, imgDate)
                    VALUES (?,?,?,?,CURRENT_TIMESTAMP)');



if ($_FILES['userPicture']['type'] != "image/jpeg" && $_FILES['userPicture']['type'] != "image/png"  ){
    header('Location: profil.php?errorFileType=invalidInput'); 

}else {

  //envoi l'image importé par l'user vers notre img

  $uploads_dir= '../img/profilPictures';
  $name = $_SESSION['id'].$_FILES['userPicture']['name'];
  $tmp_name = $_FILES['userPicture']['tmp_name'];
  move_uploaded_file($tmp_name, "$uploads_dir/$name");

  //on déclare une variable qui contient le nouveau chemin de l'image
  $imgPath = "$uploads_dir/$name";


  //on execute requete qui enregistre le chemin de l'image dans la bdd
  $req->execute(array(
      $_SESSION['id'],
      $imgPath,
      $imgTitle,
      $imgDescription
              ));

  header('Location: profil.php'); 

};