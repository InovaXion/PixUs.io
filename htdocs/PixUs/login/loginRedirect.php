<?php

include '../bdd/loginBdd.php';
 



$pseudo = htmlspecialchars($_POST['pseudo']);
$mdp = htmlspecialchars($_POST['mdp']);



$req = $bdd->prepare("SELECT * FROM users WHERE userName = ?");

$req->execute(array(
    $pseudo
));

$compteExiste = $req->fetch();


$isPasswordCorrect = password_verify($mdp, $compteExiste['userPassword']);




if (!$compteExiste) {
    header('Location: login.php?error=unknowUser');
} else {
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $compteExiste['id'];
        $_SESSION['pseudo'] = $compteExiste['userName'];
        $_SESSION['email'] = $compteExiste['email'];
        $_SESSION['bio'] = $compteExiste['bio'];
        header('Location: loginRedirect2.php');
    } else {
        header('Location: login.php?error2=wrongPassword');
    }
}
