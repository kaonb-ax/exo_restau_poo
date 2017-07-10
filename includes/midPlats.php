<div class="mainPlat">
  <?php
  include("bdd.php");
  $reponse = $bdd->query('SELECT * FROM plat');
  // On affiche chaque entrée une à une
  while ($donnees = $reponse->fetch())
  {
    echo "
    <div class='plat'>
      <p class='source resize'>".$donnees["nom"]."</p>
      <p><img src='".$donnees["image"]."' class='img_plat' alt='photo de ".$donnees["nom"]."'></p>
      <p class='prix'>".$donnees["prix"]."€</p>
    </div>";
  };
  ?>
</div>
