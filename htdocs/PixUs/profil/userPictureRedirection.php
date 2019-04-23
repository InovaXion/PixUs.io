<?php
session_start();


include '../bdd/loginBdd.php';
 
$idUser=$_SESSION['id'];


//envoi l'image importé par l'user vers notre img

$uploads_dir= '../img/pictures';
$name = $_SESSION['id'].$_FILES['userPicture']['name'];
$tmp_name = $_FILES["userPicture"]["tmp_name"];
move_uploaded_file($tmp_name, "$uploads_dir/$name");


//on déclare une variable qui contient le nouveau chemin de l'image
$imgPath = "$uploads_dir/$name";

//on fait une requete qui enregistre le chemin de l'image dans la bdd
$req=$bdd->prepare('INSERT INTO images (idUser, imgFilePath, imgDate)
                    VALUES (?,?, CURRENT_TIMESTAMP)');

$req->execute(array(
    $_SESSION['id'],
    $imgPath
));

/* //on recupère toutes les infos de l'image qui vient d'être enregistré dans la bdd
$userPicture= $bdd->prepare('SELECT * FROM images WHERE imgFilePath= ?');

$userPicture->execute(array(
  $imgPath
));
$picture = $profilPicture->fetch();

 */

/* //on enregistre dans la table user l'id de la photo de profil
$req = $bdd->prepare("UPDATE users SET idProfilPicture= ? WHERE id= $idUser");
$req->execute(array(
    $picture['id']
));  */
header('Location: profil.php');


