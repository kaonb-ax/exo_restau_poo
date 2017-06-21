<div class="mainPlat">
<?php
include("bdd.php");

$reponse = $bdd->query('SELECT * FROM menu');


// On affiche chaque entrée une à une

while ($donnees = $reponse->fetch())
{
  echo "<div class='menu'><p>".$donnees["nom"]." ";
  echo $donnees["prix"]."€</p><p> id_plat =".$donnees["id_plat"]."</p></div>";
};
?>
</div>
