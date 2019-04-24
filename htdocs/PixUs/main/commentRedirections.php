<?php
session_start();

include '../bdd/loginBdd.php';


$idUser= $_SESSION['id'];
$comment= $_POST['commentaire'];
$idPicture= $_POST['idPicture'];

$req=$bdd->prepare('INSERT INTO comments (idPicture, idUser, comment, commentDate)
                    VALUES (?,?,?,CURRENT_TIMESTAMP)');

$req->execute(array(
    $idPicture,
    $idUser,
    $comment
            ));

header('Location: main.php');