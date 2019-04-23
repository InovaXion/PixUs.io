<?php
session_start();

include '../bdd/loginBdd.php';
 

$idUserConnected = $_SESSION['id'];

$reponse = $bdd->query("SELECT * FROM images 
                        INNER JOIN users 
                        WHERE images.id = users.idProfilPicture
                        AND users.id = $idUserConnected");

$profilPicture = $reponse->fetch();

if (!$profilPicture['imgFilePath'])
{
    header('Location: ../main/main.php');
} else {
    $_SESSION['img'] = $profilPicture['imgFilePath'];
    header('Location: ../main/main.php');

};




