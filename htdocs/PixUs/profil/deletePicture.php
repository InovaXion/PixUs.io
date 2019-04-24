<?php
session_start();


include '../bdd/loginBdd.php';


$idPicture = $_POST['idPhoto'];


$req = $bdd->exec("DELETE FROM images WHERE id = " . $idPicture . "");

header('Location: profil.php'); 
