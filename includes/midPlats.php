<div class="mainPlat">
<?php
include("bdd.php");

$reponse = $bdd->query('SELECT * FROM plat');


// On affiche chaque entrée une à une

while ($donnees = $reponse->fetch())
{
  echo "<div class='plat'><p>".$donnees["nom"]." ".$donnees["prix"]."€</p>"."<p>".$donnees["image"]."</p></div>";
};
?>
</div>
