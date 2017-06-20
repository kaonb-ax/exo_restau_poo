<?php

$nomMenu = $_POST["menu"];
$prixMenu = $_POST["prix"];
$id_plat = $_POST["id"];
echo "========".$nomMenu." ".$prixMenu."========";
require_once('bdd.php');
$req = $bdd->prepare('INSERT INTO menu(id_plat, nom, prix) VALUES(:id_plat, :nom, :prix)');

$req->execute(array(
    'nom' => $nomMenu,
    'prix' => $prixMenu,
    'id_plat' => $id_plat
    ));
    header('Location:connection.php');
    exit();
?>
