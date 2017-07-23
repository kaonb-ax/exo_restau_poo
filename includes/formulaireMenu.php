
<div class="alignForm">
  <form class="text flex column" action="traitement.php" method="POST">
      <label for="menu">Menu</label>
      <input type="text" id="menu" name="menu" autofocus placeholder="découverte">
      <label for="checkbox">Choisissez les plats inclus dans votre menu</label>
        <div class="checkbox">
        <?php
        include("bdd.php");
        $reponse = $bdd->query('SELECT * FROM plat');
        while ($donnees = $reponse->fetch())
        {
          echo "<div class='checkB'>
                  <label>
                    <input type='checkbox' name='check[]' value='".$donnees["id"]."'>
                    ".$donnees["nom"]."
                  </label>
                </div>";
        };
        ?>
        </div>
      <label for="prix">prix</label>
      <div>
        <input type="text" class="inputPrix" id="prix" name="prix" placeholder="35">
        <span class="price">€</span>
      </div>
      <button type="submit" name="form_menu" value="form_menu" class="submit" name="button">Ajouter</button>
  </form>
</div>
