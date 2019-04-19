<?php


try {
    $bdd = new PDO('mysql:host=192.168.1.15;dbname=PixUs.io;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
 



$pseudo = $_POST['pseudo'];
$mdp = $_POST['mdp'];

$req = $bdd->prepare("SELECT * FROM users WHERE userName = ?");

$req->execute(array(
    $pseudo
));

$compteExiste = $req->fetch();

$isPasswordCorrect = password_verify($mdp, $compteExiste['userPassword']);


if (!$compteExiste) {
    header('Location: ../login.php?error=unknowUser');
} else {
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $compteExiste['id'];
        $_SESSION['pseudo'] = $compteExiste['userName'];
        $_SESSION['email'] = $compteExiste['email'];
        header('Location: ../main.php');
    } else {
        header('Location: ../login.php?error2=wrongPassword');
    }
}