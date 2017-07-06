<div class="mainPlat">
<?php
include("bdd.php");
$reponse = $bdd->query('SELECT * FROM menu');
// On affiche chaque entrée ligne par ligne
while ($donnees = $reponse->fetch())
{
  $find_id = $donnees["id_plat"];
  include("bdd.php");
  $reponse_plat = $bdd->query('SELECT nom, image FROM plat WHERE id = "'.$find_id.'"');
  $donnees_plat = $reponse_plat->fetch();
  echo
  "<div class='menu'>
      <p>Menu ".$donnees["nom"]."</p>
      <p> avec: ".$donnees_plat["nom"]."</p>
      <img class='img_plat' src='".$donnees_plat["image"]."' alt='photo de ".$donnees_plat["nom"]."'>
      <p class='prix'>".$donnees["prix"]."€</p>
   </div>";
};
?>
</div>
