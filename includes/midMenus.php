<div class="mainPlat">
<?php
include("bdd.php");

$reponse = $bdd->prepare('SELECT
                          menu.nom AS menu_nom,
                          menu.prix AS menu_prix,
                          menu.id AS id_menu, GROUP_CONCAT(plat.nom SEPARATOR ",") AS plat_nom
                          FROM `relation`
                          LEFT JOIN menu ON `menu`.id = `relation`.id_menu
                          LEFT JOIN plat ON `plat`.id = `relation`.id_plat
                          GROUP BY menu.id ');
$reponse->execute();

// On affiche chaque entrée ligne par ligne
while ($donnees = $reponse->fetch())
{
  $plat_array = explode(',', $donnees["plat_nom"]);
  echo
  "<div class='menu'>
      <p class='menuTitle anna'>---Menu---</p>
      <p class='source resize'>".$donnees["menu_nom"]."</p>
      <ul>";
  foreach ($plat_array as $value) {
    echo "<li>".$value."</li>";
  }
  echo"
      </ul>
      <p class='prix'>".$donnees["menu_prix"]."€</p>
   </div>";
};
?>
</div>
