<div class="mainPlat">
  <?php
  include("bdd.php");

  $reponse = $bdd->query('SELECT * FROM plat');


  // On affiche chaque entrée une à une

  while ($donnees = $reponse->fetch())
  {
    echo "<div class='plat'><p>".$donnees["nom"]."</p><p><img src='".$donnees["image"]."' class='img_plat' alt='photo de ".$donnees["nom"]."'></p><p style='text-align:right'>".$donnees["prix"]."€</p></div>";
  };
  ?>
</div>
