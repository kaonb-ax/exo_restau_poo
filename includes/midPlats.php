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
      <form class='text flex column microForm' action='traitement.php' method='POST'>
      <label>
        <input class='boxes' type='checkbox' name='list' value='".$donnees["id"]."'>
      </label>
      <button type='submit' name='supp_plat' value='supp_plat' class='true smallSubmit red'>supprimer</button>
      </form>
    </div>";
  };
  ?>
</div>
