<?php
session_start();


include '../bdd/loginBdd.php';


$idPicture = $_POST['idPhoto'];


// Delete les commentaires de l'images concerné avant de supprimé l'image because foreign Key
$req = $bdd->exec("DELETE FROM comments WHERE idPicture = ". $idPicture . "");



// Delete l'image de la BDD
$req = $bdd->exec("DELETE FROM images WHERE id = " . $idPicture . "");





header('Location: profil.php'); 
