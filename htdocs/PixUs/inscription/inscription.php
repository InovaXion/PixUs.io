<?php

try
{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=PixUs.io;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
 
$pseudo = $_POST['pseudo'];
$mdpsimple = $_POST['mdp'];
$mdpsimple2 = $_POST['mdp2'];
$mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
$email = $_POST['email'];


// Creation du compte
$crerateUser = $bdd->prepare("INSERT INTO users(userName, userPassword, email) 
                                VALUES(?,?,?");


// Vérification pseudo non pris et mdp identique 
$reponse = $bdd->prepare("SELECT * FROM users WHERE userName = ?");

$reponse->execute(array(
    $pseudo
));

$isUserAvailables = $reponse->fetch();

if ($isUserAvailables or $mdpsimple != $mdpsimple2) {
    header('Refresh: 5; URL=../inscription/inscription.php');
    echo 'Tes mots de passe ne correspondent pas ou ton pseudo est déjà pris, tu seras redirigé dans 5 secondes';
    echo '<br>';
} else {
    $crerateUser->execute(array($pseudo, $mdp, $email));
    header('Location: ../login/login.php');
}


