<?php



include '../bdd/loginBdd.php';
 
 
$pseudo = $_POST['pseudo'];
$mdpsimple = $_POST['mdp'];
$mdpsimple2 = $_POST['mdp2'];
$mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
$email = $_POST['email'];


// Creation du compte
$crerateUser = $bdd->prepare("INSERT INTO users(userName, userPassword, email) 
                                VALUES(?,?,?)");


// Vérification pseudo non pris et mdp identique 
$reponse = $bdd->prepare("SELECT * FROM users WHERE userName = ?");

$reponse->execute(array(
    $pseudo
));

$isUserAvailables = $reponse->fetch();

if ($isUserAvailables or $mdpsimple != $mdpsimple2) {
    header('Location: ../index.php?error=invalidInput');
} else {
    $crerateUser->execute(array($pseudo, $mdp, $email));
    header('Location: ../login/login.php');
}


