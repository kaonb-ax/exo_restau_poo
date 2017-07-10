
<div class="alignForm">
  <form class="text flex column" action="traitement.php" method="POST">
      <h1 class="title">Ajouter un nouveau menu !</h1>
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
        <input type="text" id="prix" name="prix" placeholder="35" style="width: 4em;">
        <span class="price">€</span>
      </div>
      <button type="submit" name="form_menu" value="form_menu" class="submit" name="button">Ajouter</button>
  </form>
</div>
