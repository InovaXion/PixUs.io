<?php
session_start();


include '../bdd/loginBdd.php';

$idUserLike=$_SESSION['id'];
$idPicture=$_POST['idPictures'];

//on prépare l'ajout d'1 like pour la photo
$req = $bdd->prepare("UPDATE images SET imgLikes = imgLikes + 1 WHERE id= $idPicture");

//on séléctionne les id des user qui ont déja liker
$req1 = $bdd->query("SELECT imgLikesId FROM images WHERE id= $idPicture");
$isUseraAlreadyLike = $req1->fetch();

//on concatene les id des personnes qui ont déjà liker + la personne qui souhaite liker
$addIdUserLike = $isUseraAlreadyLike['imgLikesId'] . $idUserLike;

//on prépare la mise à jour du nouvel id user qui a liker la page
$req2 = $bdd->prepare("UPDATE images SET imgLikesId = ? WHERE id= $idPicture");



//on péprare les variables pour voir si la personne a déjà liker la photo
$var1 = $isUseraAlreadyLike['imgLikesId'];
$var2 = $idUserLike;


if( strstr($var1, $var2)) {
    //Code à exécuter si la sous-chaine var2 est trouvée dans var1
    header('Location: main.php?error=alreadyLike');
    } else {
        $req->execute();
        $req2->execute(array(
            $addIdUserLike
        ));
        header('Location: main.php');
    }