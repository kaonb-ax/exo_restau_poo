<?php

$nomPlat = $_POST["plat"];
$prixPlat = $_POST["prix"];
$imgName = $_FILES['image']['name'];
$maxsize = $_POST['MAX_FILE_SIZE'];

// echo "===========".$nomPlat;
// echo "==".$prixPlat."=====".$imgName."======";
if ($_FILES['image']['size'] > $maxsize) $erreur = "Le fichier est trop gros";
$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
$extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";
$nomFichierPlat = "assets/img/{$nomPlat}.{$extension_upload}";
$resultat = move_uploaded_file($_FILES['image']['tmp_name'],$nomFichierPlat);
if ($resultat) echo "Transfert réussi";


require_once('bdd.php');
$req = $bdd->prepare('INSERT INTO plat(nom, prix, image) VALUES(:nom, :prix, :image)');

$req->execute(array(
    'nom' => $nomPlat,
    'prix' => $prixPlat,
    'image' => "$nomFichierPlat"
    ));
    header('Location:plats.php');
    exit();
?>
