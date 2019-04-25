<?php
session_start();

include '../bdd/loginBdd.php';

$userName = $_SESSION['pseudo'];
$idUser= $_SESSION['id'];
$comment= $_POST['commentaire'];
$idPicture= $_POST['idPicture'];

$req=$bdd->prepare('INSERT INTO comments (idPicture, idUser, userName, comment, commentDate)
                    VALUES (?,?,?,?,CURRENT_TIMESTAMP)');

$req->execute(array(
    $idPicture,
    $idUser,
    $userName,
    $comment
            ));

header('Location: profil.php');