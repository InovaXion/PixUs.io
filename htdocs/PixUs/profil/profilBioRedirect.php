<?php
session_start();


include '../bdd/loginBdd.php';
 

$pseudoID = $_SESSION['id'];
$bio =  htmlspecialchars($_POST['bio']);

$req = $bdd->prepare("UPDATE users SET bio = ? WHERE id= $pseudoID");

$req->execute(array(
    $bio
));



header('Location: profil.php');