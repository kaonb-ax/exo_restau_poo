<div class="mainPlat">
<?php
include("bdd.php");

$reponse = $bdd->query('SELECT menu.nom AS menu_nom,
                               menu.prix AS menu_prix,
                               plat.nom AS plat_nom,
                               plat.image AS plat_image
                        FROM `relation`
                        LEFT JOIN menu ON `menu`.id = `relation`.id_menu
                        LEFT JOIN plat ON `plat`.id = `relation`.id_plat');
// On affiche chaque entrée ligne par ligne
while ($donnees = $reponse->fetch())
{
  echo
  "<div class='menu'>
      <p>Menu ".$donnees["menu_nom"]."</p>
      <p> avec: ".$donnees["plat_nom"]."</p>
      <img class='img_plat' src='".$donnees["plat_image"]."' alt='photo de ".$donnees["plat_nom"]."'>
      <p class='prix'>".$donnees["menu_prix"]."€</p>
   </div>";
};
?>
</div>
