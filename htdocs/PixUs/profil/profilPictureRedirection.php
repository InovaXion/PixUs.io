<?php
session_start();


include '../bdd/loginBdd.php';
 
$idUser=$_SESSION['id'];


//on fait une requete qui enregistre le chemin de l'image dans la bdd
$req=$bdd->prepare('INSERT INTO images (idUser, imgFilePath)
                    VALUES (?,?)');


//on prépare la récupération de toutes les infos de l'image qui vient d'être enregistré dans la bdd
$profilPicture= $bdd->prepare('SELECT * FROM images WHERE imgFilePath= ?');


//on prépare l'enregistrement  dans la table user l'id de la photo de profil
$reponse = $bdd->prepare("UPDATE users SET idProfilPicture= ? WHERE id= $idUser");






if ($_FILES['profilPicture']['type'] != "image/jpeg" && $_FILES['profilPicture']['type'] != "image/png"  ){
    header('Location: profil.php?error=invalidInput'); 

}else {

  //envoi l'image importé par l'user vers notre img

  $uploads_dir= '../img/profilPictures';
  $name = $_SESSION['id'].$_FILES['profilPicture']['name'];
  $tmp_name = $_FILES["profilPicture"]["tmp_name"];
  move_uploaded_file($tmp_name, "$uploads_dir/$name");

  //on déclare une variable qui contient le nouveau chemin de l'image
  $imgPath = "$uploads_dir/$name";

  //on execute la récupération des infos de l'image
  $req->execute(array(
    $_SESSION['id'],
    $imgPath
    ));

  //on execute l'enregistrement de l'image
    $profilPicture->execute(array(
      $imgPath
    ));
    $picture = $profilPicture->fetch();

//on execute l'enregistrement de l'image dans la table user
    $reponse->execute(array(
      $picture['id']
  ));

  //on met à jour l'image de la session
  $_SESSION['img'] = $picture['imgFilePath']; 



  header('Location: profil.php'); 

};




<?php
session_start();


include '../bdd/loginBdd.php';
 

if ($_FILES['profilPicture']['type'] != "image/jpeg" && $_FILES['profilPicture']['type'] != "image/png"  ){
  header('Location: profil.php?errorPictureType=invalidInput'); 

}else {
  
// Récupérer les données du formulaire
$imgTitle = $_POST['titlePicture'];
$imgDescription = $_POST['descriptionPicture'];
$idUser=$_SESSION['id'];


//envoi l'image importé par l'user vers notre img

$uploads_dir= '../img/pictures';
$name = $_SESSION['id'].$_FILES['userPicture']['name'];
$tmp_name = $_FILES["userPicture"]["tmp_name"];
move_uploaded_file($tmp_name, "$uploads_dir/$name");


//on déclare une variable qui contient le nouveau chemin de l'image
$imgPath = "$uploads_dir/$name";

//on fait une requete qui enregistre le chemin de l'image dans la bdd
$req=$bdd->prepare('INSERT INTO images (idUser, imgFilePath, imgTitle, imgDescription, imgDate)
                    VALUES (?,?,?,?,CURRENT_TIMESTAMP)');

$req->execute(array(
    $_SESSION['id'],
    $imgPath,
    $imgTitle,
    $imgDescription
));


header('Location: profil.php');