<?php
// connexion à la base de données PixUs
try
{
    $bdd = new PDO('mysql:host=192.168.1.15;dbname=PixUs;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

