<?php
//==========appel de la BDD============
require_once("bdd.php");
// =================traitement modif plat===============
if (isset($_POST['change_plat'])) {
  //cliqué sur « modifier plat »
    echo"change";
    $new_plat = $_POST["modif_plat"];
    $new_prix = $_POST["prix"];
    $id_ancien_plat = $_POST["list"];
    // update de la BDD=====
    $req = $bdd->prepare('UPDATE plat SET
        nom = :nom,
        prix = :prix
        WHERE id = :id'
        );
    $req->execute(array(
        'nom' => $new_plat,
        'prix' => $new_prix,
        'id' => $id_ancien_plat
        ));
    header('Location:plats.php');
}elseif (isset($_POST['supp_plat'])){
  //cliqué sur « supprimer »
      $id_ancien_plat = $_POST["list"];
      //delete de l'entrée en BDD===
      $req = $bdd->prepare('DELETE FROM plat WHERE id = :id');
      $req->execute(array(
          'id' => $id_ancien_plat
          ));
      //delete de l'entrée en BDD===
      $req2 = $bdd->prepare('DELETE FROM relation WHERE id_plat = :id_plat');
      $req2->execute(array(
          'id_plat' => $id_ancien_plat
          ));
      header('Location:plats.php');
// =================traitement modif menu===============
}elseif (isset($_POST['change_menu'])){
  //cliqué sur « modifier »
    $new_menu = $_POST["menu"];
    $new_prix = $_POST["prix"];
    $new_plat = $_POST["id"];
    $id_ancien_menu = $_POST["list"];
    // update de la BDD=====
    $req = $bdd->prepare('UPDATE menu SET
        id_plat = :id_plat,
        nom = :nom,
        prix = :prix
        WHERE id = :id'
        );
    $req->execute(array(
        'id_plat' => $new_plat,
        'nom' => $new_menu,
        'prix' => $new_prix,
        'id' => $id_ancien_menu
        ));
    header('Location:menus.php');
}elseif (isset($_POST['supp_menu'])){
  //cliqué sur « supprimer »
    $id_ancien_menu = $_POST["list"];
    // delete de l'entrée en BDD===
    $req = $bdd->exec("DELETE FROM menu WHERE id = '$id_ancien_menu'");
    $req2 = $bdd->exec("DELETE FROM relation WHERE id_menu = '$id_ancien_menu'");
    header('Location:menus.php');
// =================traitement plat=====================
}elseif (isset($_POST['form_plat'])){
  $nomPlat = $_POST["plat"];
  $prixPlat = $_POST["prix"];
  $imgName = $_FILES['image']['name'];
  $maxsize = $_POST['MAX_FILE_SIZE'];
  if ($_FILES['image']['size'] > $maxsize) $erreur = "Le fichier est trop gros";
  $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
  $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
  if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";
  $nomFichierPlat = "assets/img/{$nomPlat}.{$extension_upload}";
  $resultat = move_uploaded_file($_FILES['image']['tmp_name'],$nomFichierPlat);
  if ($resultat) echo "Transfert réussi";
  $req = $bdd->prepare('INSERT INTO plat(nom, prix, image) VALUES(:nom, :prix, :image)');
  $req->execute(array(
    'nom' => $nomPlat,
    'prix' => $prixPlat,
    'image' => "$nomFichierPlat"
    ));
  header('Location:plats.php');
  exit();
// =================traitement menu=====================
}elseif (isset($_POST['form_menu'])){
  $nomMenu = $_POST["menu"];
  $prixMenu = $_POST["prix"];
  $id_plat = $_POST["id"];
  $req = $bdd->prepare('INSERT INTO menu(nom, prix) VALUES(:nom, :prix)');
  $req->execute(array(
      'nom' => $nomMenu,
      'prix' => $prixMenu
    ));

  $id_new_menu = $bdd->lastInsertId();
  $id_new_menu = intval($id_new_menu);
  $id_plat = intval($id_plat);

  $req2 = $bdd->prepare('INSERT INTO relation(id_menu, id_plat) VALUES(:id_menu, :id_plat)');
  $req2->execute(array(
      'id_menu' => $id_new_menu,
      'id_plat' => $id_plat
      ));
  header('Location:menus.php');
  exit();
}else{
    echo "vous ne devriez pas être là! alors cesser de toucher ce qui ne vous regarde pas !";
}
exit();
?>
