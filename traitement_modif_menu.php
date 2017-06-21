<?php
if (isset($_POST['change'])) {
    //cliqué sur « modifier »
    $new_menu = $_POST["menu"];
    $new_prix = $_POST["prix"];
    $id_ancien_menu = $_POST["list"];
    // update de la BDD=====
    include("bdd.php");
    $req = $bdd->prepare('UPDATE menu SET nom = :nom, prix = :prix WHERE id = :id');
    $req->execute(array(
        'nom' => $new_menu,
        'prix' => $new_prix,
        'id' => $id_ancien_menu
        ));

} elseif (isset($_POST['supp'])) {
    //cliqué sur « supprimer »
    $id_ancien_menu = $_POST["list"];
    // delete de l'entrée en BDD===
    include("bdd.php");
    $req = $bdd->exec('DELETE FROM `menu` WHERE `id` = $id_ancien_menu');
} else {
    echo "cesser de toucher ce qui ne vous regarde pas !";
}
    header('Location:menus.php');
    exit();
?>
