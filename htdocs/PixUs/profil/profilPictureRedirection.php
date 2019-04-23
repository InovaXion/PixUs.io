<?php
session_start();


include '../bdd/loginBdd.php';
 

$idUser=$_SESSION['id'];


//envoi l'image importé par l'user vers notre img

$uploads_dir= '../img/profilPictures';
$name = $_SESSION['id'].$_FILES['profilPicture']['name'];
$tmp_name = $_FILES["profilPicture"]["tmp_name"];
move_uploaded_file($tmp_name, "$uploads_dir/$name");


//on déclare une variable qui contient le nouveau chemin de l'image
$imgPath = "$uploads_dir/$name";

//on fait une requete qui enregistre le chemin de l'image dans la bdd
$req=$bdd->prepare('INSERT INTO images (idUser, imgFilePath)
                    VALUES (?,?)');

$req->execute(array(
    $_SESSION['id'],
    $imgPath
));

//on recupère toutes les infos de l'image qui vient d'être enregistré dans la bdd
$profilPicture= $bdd->prepare('SELECT * FROM images WHERE imgFilePath= ?');

$profilPicture->execute(array(
  $imgPath
));
$picture = $profilPicture->fetch();

//on enregistre dans la table user l'id de la photo de profil
$req = $bdd->prepare("UPDATE users SET idProfilPicture= ? WHERE id= $idUser");
$req->execute(array(
    $picture['id']
));

//on met à jour l'image de la session
$_SESSION['img'] = $picture['imgFilePath']; 

header('Location: profil.php');
