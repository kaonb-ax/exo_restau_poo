<?php

$nomPlat = $_POST["plat"];
$prixPlat = $_POST["prix"];
echo "===========".$nomPlat;
echo "==".$prixPlat."===========";
//$image = $_POST[image];

require_once('bdd.php');
$req = $bdd->prepare('INSERT INTO plat(nom, prix, image) VALUES(:nom, :prix, :image)');

$req->execute(array(
    'nom' => $nomPlat,
    'prix' => $prixPlat,
    'image' => "monImage"
    ));
    echo " entrer dans la base de données OK!";
    header('Location:connection.php');
    exit();
?>
