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

// ==============traitement suppression plat=============

}elseif (isset($_POST['supp_plat'])){
  //suppression via  cuisine
  if (isset($_POST["list"])) {
    $id_ancien_plat = $_POST["list"];
    //delete de l'entrée dans relation===
    $req2 = $bdd->prepare('DELETE FROM relation WHERE id_plat = :id_plat');
    $req2->execute(array(
        'id_plat' => $id_ancien_plat
        ));
    //delete de l'entrée dans plat===
    $req = $bdd->prepare('DELETE FROM plat WHERE id = :id');
    $req->execute(array(
        'id' => $id_ancien_plat
        ));
    header('Location:plats.php');
  //suppression via plat
  }else if(isset($_POST["check"])){
      //suppression de chacun des plats coché
      foreach($_POST['check'] as $id_plat){
        //convertion de l'ID en INT
        $id_ancien_plat = intval($id_plat);
        $req2 = $bdd->prepare('DELETE FROM relation WHERE id_plat = :id_plat');
        $req2->execute(array(
            'id_plat' => $id_ancien_plat
            ));
        //delete de l'entrée dans plat===
        $req = $bdd->prepare('DELETE FROM plat WHERE id = :id');
        $req->execute(array(
            'id' => $id_ancien_plat
            ));
      }
    }else{
      echo"erreur";
    }
// =================traitement modif menu===============

}elseif (isset($_POST['change_menu'])){
  //cliqué sur « modifier »
    $new_menu = $_POST["menu"];
    $new_prix = $_POST["prix"];
    $id_ancien_menu = $_POST["list"];
    echo"<p>new_menu:</p>";
    var_dump($new_menu);
    echo"<br/><p>new_prix: </p>";
    var_dump($new_prix);
    echo"<br/><p>id_ancien_menu: </p>";
    var_dump($id_ancien_menu);
    // update de la BDD=====
    $req = $bdd->prepare('UPDATE menu SET
        nom = :nom,
        prix = :prix
        WHERE id = :id'
        );
    $req->execute(array(
        'nom' => $new_menu,
        'prix' => $new_prix,
        'id' => $id_ancien_menu
        ));
    //on supprime toute les entrer de l'ancien menu======
    $req2 = $bdd->exec("DELETE FROM relation WHERE id_menu = '$id_ancien_menu'");
    //on recréé toute les entrées du nouveau menu========
    foreach($_POST['check'] as $id_plat){
      //convertion de l'ID en INT
      $id_plat = intval($id_plat);
      //ajout en base pour chaque ID de plat
      $req2 = $bdd->prepare('INSERT INTO relation(id_menu, id_plat) VALUES(:id_menu, :id_plat)');
      $req2->execute(array(
          'id_menu' => $id_ancien_menu,
          'id_plat' => $id_plat
        ));
      }
    header('Location:menus.php');

// ==============traitement suppression menu=============

}elseif (isset($_POST['supp_menu'])){
  //cliqué sur « supprimer »
    $id_ancien_menu = $_POST["list"];
    // delete de l'entrée en BDD===
    $req2 = $bdd->exec("DELETE FROM relation WHERE id_menu = '$id_ancien_menu'");
    $req = $bdd->exec("DELETE FROM menu WHERE id = '$id_ancien_menu'");
    header('Location:menus.php');

// =================traitement plat=====================

}elseif (isset($_POST['form_plat'])){
  $nomPlat = $_POST["plat"];
  $prixPlat = $_POST["prix"];
  $imgName = $_FILES['image']['name'];
  $maxsize = $_POST['MAX_FILE_SIZE'];
  //verification de la taille maximum==
  if ($_FILES['image']['size'] > $maxsize) $erreur = "Le fichier est trop gros";
  //creation liste des extention valides==
  $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
  //mise au normes voulut du nom de l'image==
  $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
  // controle de l'extention par rapport a la liste des ext valides==
  if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";
  //création du nom définitif de l'image incluant sa position sur le serv
  $nomFichierPlat = "assets/img/{$nomPlat}.{$extension_upload}";
  //copie de l'imgae sur le serv
  $resultat = move_uploaded_file($_FILES['image']['tmp_name'],$nomFichierPlat);
  if ($resultat) echo "Transfert réussi";
  //insertion du nom de l'image sur la BDD
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
  $req = $bdd->prepare('INSERT INTO menu(nom, prix) VALUES(:nom, :prix)');
  $req->execute(array(
      'nom' => $nomMenu,
      'prix' => $prixMenu
    ));
  //recuperation de l'ID du nouveau menu et conversion en INT
  $id_new_menu = $bdd->lastInsertId();
  $id_new_menu = intval($id_new_menu);
  //traitement des checkboxes et entrée dans la table relation
  foreach($_POST['check'] as $id_plat){
    //convertion de l'ID en INT
    $id_plat = intval($id_plat);
    //ajout en base pour chaque ID de plat
    $req2 = $bdd->prepare('INSERT INTO relation(id_menu, id_plat) VALUES(:id_menu, :id_plat)');
    $req2->execute(array(
        'id_menu' => $id_new_menu,
        'id_plat' => $id_plat
      ));
    }
  header('Location:menus.php');
  exit();

// =================auto_completion_menu=====================

}elseif (isset($_POST['auto_completion_menu'])){
  $id_selected_menu = $_POST["list"];
  $req = $bdd->prepare('SELECT nom AS nom FROM menu WHERE id = :id_menu');
  $req->execute(array(
      'id_menu' => $id_selected_menu
      ));
      while ($donnees = $req->fetch())
  header('Location:modif_menu.php?nom_menu='.$donnees['nom'].'&id_menu='.$_POST["list"]);
  exit();
// cas de vide ou d'erreur==================================
}else{
    echo " une erreur est survenue, vous ne devriez pas être là!";
}
exit();
?>
